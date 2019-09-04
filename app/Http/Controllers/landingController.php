<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Fund;

class landingController extends Controller
{
    //

    public function landing()
    {
        if(Auth::check()){
            return redirect('/feed');
        } else {
            $funds = Fund::all();
            return view('landing.landing', ['funds'=> $funds]);
        }
    }
    public function register()
    {
        $funds = Fund::all();
        return view('/?register', ['funds'=> $funds]);
    }
    public function login()
    {
        $funds = Fund::all();
        return redirect("/?login")->with(['funds'=>$funds]);
    }
}
