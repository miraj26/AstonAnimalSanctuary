<?php

namespace App\Http\Controllers;
use AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
    	
    	if(Auth::attempt([
    		'username' => $request->username,
    		'password' => $request->password
    	])){
    		$user = User::where('username', $request->username)->first();
    		if($user->is_admin()){
    			return redirect()->route('dashboard');
    		}
    		return redirect()->route('home');
    	}

	    return redirect()->back();
    }
}
