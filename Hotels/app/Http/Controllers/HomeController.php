<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = Hotel::orderBy('created_at','desc')->get();
       
          return view('welcome')->with('hotels',$hotels);   
    }
}
