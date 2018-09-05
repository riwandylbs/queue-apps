<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
