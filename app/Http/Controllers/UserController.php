<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show($username){
    	$user = User::where('username', '=', $username)->first();
    	return view('animals.owner', compact('user'));
    }
}
