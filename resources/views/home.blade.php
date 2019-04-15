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
                 
                 Welcome to your Aston Animal Sanctuary web portal!
                 <br/>
                 Here you can browse all the available pets, and view the requests you have already made
                 <br/><br/>
                <table class="table table-striped table-bordered table-hover">
                	<tr><th>User ID</th><td>{{$user->id}} </td></tr>
                	<tr><th>Username</th><td>{{$user->username}}</td></tr>
                	<tr><th>First Name</th><td>{{$user->firstName}}</td></tr>
                	<tr><th>Last Name</th><td>{{$user->lastName}}</td></tr>
                	<tr><th>Email</th><td>{{$user->email}}</td></tr>
                	<tr><th>Address</th><td>{{$user->address}}</td></tr>
                	<tr><th>Postcode</th><td>{{$user->postcode}}</td></tr>
                </table>
                <a href="{{action('HomeController@edit', $user['id'])}}" class="btn btn- warning">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection