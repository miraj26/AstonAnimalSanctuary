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
                 <a href="{{route('all_requests')}}">All Requests Made</a>
                 <br/>
                 <table class="table table-striped table-bordered table-hover">
                    <thead>
                         <tr>
                         <th> name</th><th> dob</th>
                         <th> description </th><th> picture </th><th>Request</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($animals as $animal)
                        <?php $requested = false; ?>
                        @if($animal->availability == 1)
                        <tr>
                        <td> {{$animal->name}} </td>
                        <td> {{$animal->dob}} </td>
                        <td> {{$animal->description}} </td>
                        <td>
                        <center><img style="width:25%;height:25%"
        src="{{ asset('storage/images/'.$animal->image)}}"></center></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection