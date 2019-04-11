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
                 <a href="{{route('home')}}">Available Pets</a>
                 <br/>
                 <table class="table table-striped table-bordered table-hover">
                    <thead>
                         <tr>
                         <th> AnimalID</th><!--<th> Pet Name</th>-->
                         <th> Outcome </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($adoptions as $adoption)
                        @if($adoption->username == $username)
                        <tr>
                            <td>{{$adoption->animalId}} </td>
                            
                            <td>{{$adoption->accepted}} </td>
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