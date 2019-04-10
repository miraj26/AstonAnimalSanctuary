<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Animals;
use Gate;

class AnimalController extends Controller
{
    public function display(){
    	$animalsQuery = Animals::all();
    	return view('/display',array('animals'=>$animalsQuery));
    }

    public function index(){
    	$animals = Animals::all()->toArray();
    	return view('animals.index', compact('animals'));
    }

    public function create(){
    	return view('animals.create');
    }

    public function store(Request $request){
    	$animal = $this->validate(request(), [
    		'name' => 'required',
    		'dob' => 'required',
    		'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
    	]);
    	if($request->hasFile('image')){
    		$fileNameWithExt = $request->file('image')->getClientOriginalName();
    		$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    		$extension = $request->file('image')->getClientOriginalExtension();
    		$fileNameToStore = $fileName.'_'.time().'.'.$extension;
    		$path = $request->file('image')->storeAs('public/images',$fileNameToStore);
    	} else{
    		$fileNameToStore = 'noimage.jpg';
    	}
    	$animal = new Animals;
    	$animal->name = $request->input('name');
    	$animal->dob = $request->input('dob');
    	$animal->description = $request->input('description');
    	$animal->created_at = now();
    	$animal->image = $fileNameToStore;
    	$animal->save();
    	return back()->with('success', 'Animal has been added');
    }

    public function show($id){
    	$animals = Animals::find($id);
    	return view('animals.show', compact('animals'));
    }

    public function destroy($id){
    	$animal = Animals::find($id);
    	$animal->delete();
    	return redirect('animals')->with('success', 'Animal has been deleted');
    }

    public function update(Request $request, $id){
    	$animals = Animals::find($id);
    	$this->validate(request(),[
    		'name' => 'required',
    		'dob' => 'required'
    	]);

    	$animals->name = $request->input('name');
    	$animals->dob = $request->input('dob');
    	$animals->description = $request->input('description');
    	$animals->availability = $request->input('availability');
    	if($request->hasFile('image')){
    		$fileNameWithExt = $request->file('image')->getClientOriginalName();
    		$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    		$extension = $request->file('image')->getClientOriginalExtension();
    		$fileNameToStore = $fileName.'_'.time().'.'.$extension;
    		$path = $request->file('image')->storeAs('public/images',$fileNameToStore);
    	} else{
    		$fileNameToStore = 'noimage.jpg';
    	}
    	$animals->image=$fileNameToStore;
    	$animals->availability = $request->input('availability');
    	$animals->save();
    	return redirect('animals')->with('success', 'Animal has not been updated');
    }

    public function edit($id){
    	$animals = Animals::find($id);
    	return view('animals.edit', compact('animals'));
    }
}
