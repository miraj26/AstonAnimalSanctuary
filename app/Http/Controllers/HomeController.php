<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
use App\AdoptionRequest;

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
        $user = \Auth::user();
        return view('/home',array('user'=>$user));
    }

    public function requested(){
        return view('requestmade');
    }

    public function allrequest(){
        $adoptionsQuery = AdoptionRequest::all();
        $username = \Auth::user()->username;
        return view('adoption_requests.requestsmade', array('username'=>$username, 'adoptions'=>$adoptionsQuery));
    }

    public function pets(){
        $animalsQuery = Animals::all();
        $username = \Auth::user()->username;
        $adoptionsQuery = AdoptionRequest::all();
        return view('adoption_requests.availablepets', array('animals'=>$animalsQuery,'username'=>$username, 'adoptions'=>$adoptionsQuery));
    }
}
