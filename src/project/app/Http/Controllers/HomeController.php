<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
		$this->middleware('language');
    }

    /**
     * Show the orders dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('home.index');
    }
}
