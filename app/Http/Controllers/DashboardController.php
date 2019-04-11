<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdoptionRequest;

class DashboardController extends Controller
{
    public function pending(){
    	$adoptionsQuery = AdoptionRequest::all();
    	return view('admin.pending', array('adoptions' => $adoptionsQuery));
    }

    public function requests(){
    	$adoptionsQuery = AdoptionRequest::all();
    	return view('admin.requests', array('adoptions' => $adoptionsQuery));
    }

    public function review(Request $request, $id, $username){
    	$adoptions = AdoptionRequest::where('animalId', '=', '$id')->where('username', '=', '$username')->get();
    	$adoptions->accepted = $request->input('accepted');
    	$adoptions->save();
    	return back()->with('success', 'Adoption Request has been updated');
    }

    public function index(){

    }

    public function store(){

    }

    public function create(){

    }
}
