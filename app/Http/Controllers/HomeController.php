<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function index()
    {
        return view('description');
    }
    public function index()
    {
        return view('chat');
    }
    public function index()
    {
        return view('customer');
    }
    public function index()
    {
        return view('employee');
    }
}
