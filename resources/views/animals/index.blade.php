@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
			<div class="card-header">Display all Pets</div>
			<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>DOB</th>
						<th>Description</th>
						<th>Image</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($animals as $animal)
					<tr>
						<td>{{$animal['name']}}</td>
						<td>{{$animal['dob']}}</td>
						<td>{{$animal['description']}}</td>
						<td>{{$animal['image']}}</td>
						<td><a href="{{action('AnimalController@show', $animal['id'])}}" class="btn btn- primary">Details</a></td>
						<td><a href="{{action('AnimalController@edit', $animal['id'])}}" class="btn
					btn- warning">Edit</a></td>
						<td>
						<form action="{{action('AnimalController@destroy', $animal['id'])}}"
					method="post"> @csrf
						<input name="_method" type="hidden" value="DELETE">
						<button class="btn btn-danger" type="submit"> Delete</button>
						</form>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<a href="{{action('AnimalController@create')}}" class="btn btn-primary">Add Pet</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection