<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
use App\AdoptionRequest;
use App\User;

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
        if(request()->has('type')){
            $animalsQuery = Animals::where('type', request('type'))->paginate(10)->appends('type', request('type'));
        } else{
            $animalsQuery = Animals::paginate(10);
        }
        
        $username = \Auth::user()->username;
        $adoptionsQuery = AdoptionRequest::all();
        return view('adoption_requests.availablepets', array('animals'=>$animalsQuery,'username'=>$username, 'adoptions'=>$adoptionsQuery));
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        $this->validate(request(),[
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postcode' => 'required',
        ]);
        $users->firstName = $request->input('firstName');
        $users->lastName = $request->input('lastName');
        $users->address = $request->input('address');
        $users->postcode = $request->input('postcode');
        $users->save();
        return redirect('home')->with('success', 'User details have been updated');
    }

    public function edit($id){
        $users = User::find($id);
        return view('edituser', compact('users'));
    }

}
