<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $user = Auth::user();

        return view('pages.dashboard.index', ['user' => $user]);
    }
    public function about(){
        return view('pages.about.index');
    }
}
