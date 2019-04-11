@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to the admin portal!
                    <br>
                    <a href="{{ route('display_animal')}}" class="btn btn-primary">Display Animals</a>
                    <a href="{{ route('pending')}}" class="btn btn-primary">Pending Requests</a>
                    <a href="{{ route('requests')}}" class="btn btn-primary">View All Requests</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
