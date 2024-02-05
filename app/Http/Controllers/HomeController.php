<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        return view('pages.dashboard.index');
    }
    public function about(){
        return view('pages.about.index');
    }
}
