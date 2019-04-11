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
        $animalsQuery = Animals::all();
        $username = \Auth::user()->username;
        $adoptionsQuery = AdoptionRequest::all();
        return view('/home',array('animals'=>$animalsQuery,'username'=>$username, 'adoptions'=>$adoptionsQuery));
    }

    public function requested(){
        return view('requestmade');
    }
}
