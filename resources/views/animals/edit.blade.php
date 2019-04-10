@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
	<div class="col-md-8 ">
	<div class="card">
	<div class="card-header">Edit and Update the Pet</div>
		@if ($errors->any())
		<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
		</div>
		<br />
		@endif
		@if (\Session::has('success'))
		<div class="alert alert-success">
			<p>{{ \Session::get('success') }}</p>
		</div><br />
		@endif
		<div class="card-body">
		<form class="form-horizontal" method="POST" action="{{ action('AnimalController@update',
		$animals['id']) }} " enctype="multipart/form-data" >
		@method('PATCH')
		@csrf
		<div class="col-md-8">
			<label>Pet Name</label>
			<input type="text" name="name" value="{{$animals->name}}"/>
		</div>
		<div class="col-md-8">
			<label>Pet DOB</label>
			<input type="date" name="dob" value="{{$animals->dob}}" />
		</div>
		<div class="col-md-8">
			<label>Description</label>
			<textarea rows="4" cols="50" name="description" > {{$animals->description}}
			</textarea>
		</div>
		<div class="col-md-8">
			<label>Image</label>
			<input type="file" name="image" />
		</div>
		<div class="col-md-8">
			<label>Pet Availability</label>
			<input type="hidden" name="availability" value="0">
			<input type="checkbox" name="availability"/>
		</div>
		<div class="col-md-6 col-md-offset-4">
			<input type="submit" class="btn btn-primary" />
			<input type="reset" class="btn btn-primary" />
			</a>
		</div>
		</form>
	</div>
	</div>
	</div>
	</div>
</div>
@endsection