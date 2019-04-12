<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animals;
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

    public function review(Request $request, $id, $animalId){
    	$adoptions = AdoptionRequest::find($id);
    	$adoptions->accepted = $request->input('accepted');
    	$adoptions->save();

    	if($adoptions->accepted == 'Approved'){
    		$animal = Animals::where('id', '=', $animalId)->first();
    		$animal->availability = 'Unavailable';
    		$animal->save();

	    	$other = AdoptionRequest::where("animalId", '=', $animalId)->where('accepted', '=', 'Pending')->get();
	    	foreach ($other as $record) {
	    		$record->accepted = 'Rejected';
	    		$record->save();
	    	}
	    }

    	return back()->with('success', 'Adoption Request has been updated');
    }
}
