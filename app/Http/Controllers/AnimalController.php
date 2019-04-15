<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Animals;
use App\AdoptionRequest;
use App\User;
use Gate;

class AnimalController extends Controller
{

    public function index(){
        if(request()->has('type')){
            $animals = Animals::where('type', request('type'))->paginate(10)->appends('type', request('type'));
        } else{
            $animals = Animals::paginate(10);
        }
        $users = User::all();
        $adoptions = AdoptionRequest::all();
    	return view('animals.index', compact('animals', 'users', 'adoptions'));
    }

    public function create(){
    	return view('animals.create');
    }

    public function store(Request $request){
    	$animal = $this->validate(request(), [
    		'name' => 'required',
    		'dob' => 'required',
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'type' => 'required'
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
        $animal->type = $request->input('type');
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
        $adoption = AdoptionRequest::where('animalId', '=', $id);
        $adoption->delete();
    	return redirect('animals')->with('success', 'Animal has been deleted');
    }

    public function update(Request $request, $id){
    	$animals = Animals::find($id);
    	$this->validate(request(),[
    		'name' => 'required',
    		'dob' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
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
    		$fileNameToStore = $request->file('image')->getClientOriginalName();
    	}
    	$animals->image=$fileNameToStore;
    	$animals->availability = $request->input('availability');
    	$animals->save();
    	return redirect('animals')->with('success', 'Animal has been updated');
    }

    public function edit($id){
    	$animals = Animals::find($id);
    	return view('animals.edit', compact('animals'));
    }
}
