<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(Request $req)
    {
        return view('content.example');
    }    

    public function loket(Request $req)
    {
        return view('content.loket');
    }
    
    public function gudang(Request $req)
    {
        return view('content.gudang');        
    }
}
