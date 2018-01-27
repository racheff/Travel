<?php

namespace App\Http\Controllers;

use App\Destinations;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destinations::with('agents')->get();
        return view('welcome')->with('destinations', $destinations);
    }
}
