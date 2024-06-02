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
        // return view('home');
        if (auth()->user()->is_type == '1') {
            return view('admin.dashboard');
        }if (auth()->user()->is_type == '2') {
            return view('charity.profile');
        }if (auth()->user()->is_type == '0') {
            return view('user.profile');
        }
        if (auth()->user()->is_type == 0) {
            return view('home');
        }
        // return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('user.profile');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.dashboard');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function charityHome()
    {
        // dd('test');
        return view('charity.profile');
    }
}
