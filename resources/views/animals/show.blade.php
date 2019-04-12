@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
	<div class="col-md-8 ">
	<div class="card">
	<div class="card-header">Display all Animals</div>
	<div class="card-body">
	<table class="table table-striped" border="1" >
		<tr> <td> <b>Name </th> <td> {{$animals['name']}}</td></tr>
		<tr> <th>DOB</th> <td>{{$animals['dob']}}</td></tr>
		<tr> <th>Description </th> <td>{{$animals['description']}}</td></tr>
		<tr> <td>Image </th> <td>{{$animals['image']}}</td></tr>
		<tr> <td colspan='2' ><img style="width:100%;height:100%"
		src="{{ asset('storage/images/'.$animals['image'])}}"></td></tr>
	</table>
	<table><tr>
		<td><a href="{{ route('display_animal')}}" class="btn btn-primary" role="button">Back to the list</a></td>
		<td><a href="{{action('AnimalController@edit', $animals['id'])}}" class="btn
		btn- warning">Edit</a></td>
		<td><form action="{{action('AnimalController@destroy', $animals['id'])}}"
		method="post"> @csrf
		<input name="_method" type="hidden" value="DELETE">
		<button class="btn btn-danger" type="submit">Delete</button>
	</form></td>
	</tr></table>
	</div>
	</div>
	</div>
	</div>
</div>
@endsection