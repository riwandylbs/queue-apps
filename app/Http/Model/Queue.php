<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Model\TempDock;
use Illuminate\Support\Facades\Auth;

class Queue extends Model
{
    protected $table = 'queue';

    public static function store(Request $request)
    {
        $res = new \stdClass();
        $res->isSuccess = false;

        $table = new self();
        $table->date_in = $request->input('date_in');
        $table->loading_dock = $request->input('loading_dock');
        $table->vehicle_no = $request->input('vehicle_no');
        $table->expd_name = $request->input('expd_name');
        $table->card_no = $request->input('card_no');
        // $table->save();
        
        if($table->save()) {
            $table->save();
            self::addTempDock();
            $res->isSuccess = true;
            return $res;
        }

        return $res;
    }

    public static function addTempDock()
    {
        $last = TempDock::orderBy('created_at', 'desc')->first();

        $userId = Auth::id();
        $tempDock = new TempDock();
        $tempDock->number = $last->number + 1;
        $tempDock->created_by = $userId;
        $tempDock->save();

        return true;
    }
}
