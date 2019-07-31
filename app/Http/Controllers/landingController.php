<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingController extends Controller
{
    //

    public function landing()
    {
        return view('landing.landing');
    }
    public function register()
    {
        return view('/?register');
    }
    public function login()
    {
        return redirect('/?login');
    }
}
