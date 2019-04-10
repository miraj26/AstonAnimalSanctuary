@extends('layouts.app')
@section('content')
<div class="container">
	 <div class="row justify-content-center">
		 <div class="col-md-8">
		 <div class="card">
		 <div class="card-header">Dashboard</div>
		 <div class="card-body">
		 @if (session('status'))
		 <div class="alert alert-success">
		 {{ session('status') }}
	 </div>
	 @endif
	 <table class="table table-striped table-bordered table-hover">
	 	<thead>
			 <tr>
			 <th> id</th><th> name</th><th> dob</th>
			 <th> description </th><th> picture </th><th> availability</th>
	 	</tr>
	 	</thead>
	 	<tbody>
			@foreach($animals as $animal)
			<tr>
			<td> {{$account->id}} </td>
			<td> {{$account->name}} </td>
			<td> {{$account->dob}} </td>
			<td> {{$account->description}} </td>
			<td> {{$account->picture}} </td>
			</tr>
			@endforeach
	 	</tbody>
	 </table>
	 </div>
	 </div>
	 </div>
 </div>
</div>
@endsection