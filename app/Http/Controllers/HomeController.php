<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\Queue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.example');
    }

    public function front()
    {
        $queueDb = Queue::orderBy('created_at', 'desc')->get();
        return view('content.front', compact('queueDb'));
    }
}
