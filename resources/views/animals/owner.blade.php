@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 ">
			<div class="card">
			<div class="card-header">Owner Details</div>
			<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Postcode</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$user['username']}}</td>
						<td>{{$user['firstName']}}</td>
						<td>{{$user['lastName']}}</td>
						<td>{{$user['email']}}</td>
						<td>{{$user['address']}}</td>
						<td>{{$user['postcode']}}</td>
											
					</tr>
				</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection