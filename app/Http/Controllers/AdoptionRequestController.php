<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Animals;
use App\AdoptionRequest;

class AdoptionRequestController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create($id)
    {
        $animals = Animals::find($id);
        return view('adoption_requests.edit', compact('animals'));
    }

    public function update(Request $request, $id){
        $animals = Animals::find($id);
        $this->validate(request(),[
            'id' => 'required',
            'username' => 'required',
        ]);

        $adopt = new AdoptionRequest;
        $adopt->animalId = $request->input('id');
        $adopt->username = $request->input('username');
        $adopt->created_at = now();
        $adopt->save();
        return redirect('requestmade')->with('success', 'Request has been made');
    }
}
