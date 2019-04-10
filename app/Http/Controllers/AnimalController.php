<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;

class AnimalController extends Controller
{
    public function display(){
    	$animalsQuery = \App\Animals::all();
    	return view('/display',array('animals'=>$animalsQuery));
    }

}
