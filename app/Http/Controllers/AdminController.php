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
        $dockNumber = TempDock::orderBy('created_at', 'desc')->first();
        return view('content.loket', compact('dockNumber'));
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

        $insert = Queue::store($request);

        return redirect('/loket');     
    }
    
    public function gudang(Request $req)
    {
        return view('content.gudang');        
    }
}
