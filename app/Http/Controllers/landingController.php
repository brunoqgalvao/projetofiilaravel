<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class landingController extends Controller
{
    //

    public function landing()
    {
        if(Auth::check()){
            return redirect('/feed');
        } else {
            return view('landing.landing');
        }
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
