@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Available Pets</div>
                <div class="card-body">
                @if (session('status'))
                 <div class="alert alert-success">
                 {{ session('status') }}
                 </div>
                 @endif
                 <form>
                 	Filter by Pet Type:
	                 <select name="type">
	                 	<option value="Dog">Dog</option>
	                 	<option value="Cat">Cat</option>
	                 	<option value="Aquarium">Aquarium</option>
	                 	<option value="Bird">Bird</option>
	                 	<option value="Mammal">Mammal</option>
	                 	<option value="Rodent">Rodent</option>
	                 	<option value="Reptile">Reptile</option>
	                 	<option value="Amphiban">Amphibian</option>
	                 	<option value="Horse">Horse</option>
	                 </select>
	                 <input type="submit" /> |
	                 <a href="availablepets/"> Reset </a>
	             </form>
	             <br/>
                 <table class="table table-striped table-bordered table-hover">
                    <thead>
                         <tr>
                         <th> Name</th><th> DOB</th>
                         <th> Description </th><th> Type</th><th> Picture </th><th>Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($animals as $animal)
                        <?php $requested = false; ?>
                        @if($animal->availability == 'Available')
                        <tr>
                        <td> {{$animal->name}} </td>
                        <td> {{$animal->dob}} </td>
                        <td> {{$animal->description}} </td>
                        <td> {{$animal->type}} </td>
                        <td>
                        <center><img style="width:50%;height:50%" src="{{ asset('storage/images/'.$animal->image)}}"></center></td>
                        <td>
                        @forelse($adoptions as $adoption)
                        @if($adoption->username == $username && $adoption->animalId == $animal->id)
                        Request Made
                        <?php $requested = true; ?>
                        @endif
                        @empty
                        @endforelse
                        @if($requested == false)
                        <a href="{{action('AdoptionRequestController@create', $animal['id'])}}" class="btn btn-primary" role="button">Make Request</a>
                        @endif
                        </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                {{ $animals->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection