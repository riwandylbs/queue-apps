<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Model\TempDock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Queue extends Model
{
    protected $table = 'queue';

    public function store(Request $request)
    {
        $res = new \stdClass();
        $res->isSuccess = false;

        $table = new self();
        $table->date_in = $request->input('date_in');
        $table->loading_dock = $request->input('loading_dock');
        $table->vehicle_no = $request->input('vehicle_no');
        $table->expd_name = $request->input('expd_name');
        $table->card_no = $request->input('card_no');
        $table->save();
        
        if($table->save()) {
            $table->save();
            self::addTempDock();
            $res->isSuccess = true;
            return $res;
        }

        return $res;
    }

    public function addTempDock()
    {
        $last = TempDock::orderBy('created_at', 'desc')->first();

        $userId = Auth::id();
        $tempDock = new TempDock();
        $tempDock->number = $last->number + 1;
        $tempDock->created_by = $userId;
        $tempDock->save();

        return true;
    }

    public function searching($vehicleNumber = null)
    {
        $data = DB::table('queue')
                ->where('vehicle_no', 'LIKE', $vehicleNumber)
                ->where('status','ready')
                ->first();

        return $data;
    }

    public function checkout(Request $request)
    {
        $queueDb  = Queue::where('vehicle_no', $request->input('vehicle_no', null))->where('status', 'ready')->first();
        $queueDb->check_in = $request->input('date_in');
        $queueDb->check_out = $request->input('check_out');
        $queueDb->locations = "checkout";

        if ($queueDb->save()) {
            $queueDb->save();
            return $queueDb;
        }

        return false;
    }

    public static function getAlldata($param)
    {
        if (isset($param)) {
            $data = Queue::where('date_in', 'LIKE', $param."%")->orWhere('check_out', 'LIKE', $param."%")->get();
        } else {
            $data = Queue::orderBy('created_at', 'desc')->get();
        }

        return $data;
    }

    public function searchVehicle($date = null, $vehicleNumber = null)
    {
        if (!empty($date) && !empty($vehicleNumber)) {
            $data = Queue::where('date_in', 'LIKE', $date."%")
                        ->orWhere('vehicle_no', 'LIKE', "%".$vehicleNumber."%")
                        ->get();
        } else if (!empty($date)) {
            $data = Queue::where('date_in', 'like', $date."%")->get();            
        } else{
            $data = Queue::where('vehicle_no', 'LIKE', "%".$vehicleNumber."%")->get();
        }

        return $data;
    }

    public static function history($vehicleNumber = null)
    {
        $data = Queue::where('vehicle_no', $vehicleNumber )->orderBy('created_at', 'DESC')->get();
        return $data;        
    }

    public static function setTimeStart(Request $request, $id)
    {
        $user = Auth::id();
        $getGudang = AccessGudang::with('gudang')->where('user_id', $user)->first();

        $queueDb = Queue::find($id);
        
        if (empty($queueDb->time_start)) {
            $queueDb->locations = $getGudang->gudang->gudang_name;
            $queueDb->type = $request->input('type');
            $queueDb->status = $request->input('status');
            $queueDb->check_in = $request->input('check_in');
            $queueDb->time_start = $request->input('time_start');
        } else {
            $queueDb->time_finish = $request->input('time_finish');
            $queueDb->status = 'Done';
        }

        $queueDb->save();

        return $queueDb;
    }
}
