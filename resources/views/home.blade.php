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
                 <table class="table table-striped table-bordered table-hover">
                    <thead>
                         <tr>
                         <th> name</th><th> dob</th>
                         <th> description </th><th> picture </th><th>Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($animals as $animal)
                        @foreach($adoptions as $adopt)
                        @if($animal->availability == 1 && $adopt->userId != $username && $adopt->animalId != $animal->id)
                        <tr>
                        <td> {{$animal->name}} </td>
                        <td> {{$animal->dob}} </td>
                        <td> {{$animal->description}} </td>
                        <td><center><img style="width:25%;height:25%"
        src="{{ asset('storage/images/'.$animal->image)}}"></center></td>
                        <td><a href="{{action('AdoptionRequestController@create', $animal['id'])}}" class="btn btn-primary" role="button">Make Request</a></td>
                        </tr>
                        @endif
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection