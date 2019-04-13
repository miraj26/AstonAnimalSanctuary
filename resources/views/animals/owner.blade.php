@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
			<div class="card-header">Owner Details</div>
			<div class="card-body">
			<table class="table table-striped">
				<tr><th>Username</th><td>{{$user['username']}}</td></tr>
				<tr><th>First Name</th><td>{{$user['firstName']}}</td></tr>
				<tr><th>Last Name</th><td>{{$user['lastName']}}</td></tr>
				<tr><th>Email</th><td>{{$user['email']}}</td></tr>
				<tr><th>Address</th><td>{{$user['address']}}</td></tr>
				<tr><th>Postcode</th><td>{{$user['postcode']}}</td></tr>
				</table>
				<br/>
					<a href="{{ route('display_animal')}}" class="btn btn-primary" role="button">Back to the list</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection