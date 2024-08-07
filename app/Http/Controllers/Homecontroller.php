<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    //
    public function index()
    {
        return view('front.index');
    }
    
    public function packages()
    {
        return view('front.packages');
    }
    public function blog()
    {
        return view('front.blog');
    }
    public function destinations()
    {
        return view('front.destinations');
    }
    public function contact()
    {
        return view('front.contact');
    }
}
