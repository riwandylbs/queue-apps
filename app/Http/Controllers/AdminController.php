<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Model\TempDock;
use App\Http\Model\Queue;

class AdminController extends Controller
{
    public function dashboard(Request $req)
    {
        return view('content.example');
    }    

    public function loket(Request $request)
    {
        $tabCheckIn     = 'active';
        $tabCheckout    = '';
        $dockNumber     = TempDock::orderBy('created_at', 'desc')->first();
        $queueDb        = Queue::getAlldata($request->input('data-list', null));

        if ($request->input('search_vehicle', null)) {
            $tabCheckIn     = '';
            $tabCheckout    = 'active';
            $queueDb    = new Queue();
            $searching  = $queueDb->searching($request->input('search_vehicle', null));

            if (isset($searching)) {
                return view('content.loket', compact('dockNumber', 'tabCheckout', 'tabCheckIn', 'searching', 'queueDb'));                       
            } 
            
            return redirect('/loket')->with('message', 'Data Not Found');   
        }

        return view('content.loket', compact('dockNumber', 'tabCheckout', 'tabCheckIn', 'queueDb'));
    }

    public function createQueue(Request $request)
    {
        $validate = $request->validate([
            'date_in' => 'required',
            'loading_dock' => 'required|unique:queue',
            'vehicle_no' => 'required',
            'expd_name' => 'required',
            'card_no' => 'required|integer'
        ]);

        $queueDb  = new Queue();
        $insert = $queueDb->store($request);

        return redirect('/loket')->with('message', 'Data Berhasil di tambahkan');     
    }
    
    public function checkout(Request $request)
    {
        $queueDb  = new Queue();
        $update   = $queueDb->checkout($request); 
        if ($update) {
            return redirect('/loket')->with('message', 'Check Out Success');   
        }

        return redirect('/loket')->with('error', 'Failed to checkout');   
    }
    
    public function gudang(Request $request)
    {
        $queueDb = Queue::getAlldata($request->input('data-list', null));

        if ($request->input('search_vehicle', null)) {
            $queueDb    = new Queue();
            $searching  = $queueDb->searching($request->input('search_vehicle', null));
            // return view('content.home_gudang', compact(''));        
        }
        return view('content.home_gudang', compact('queueDb'));        
    }
}
