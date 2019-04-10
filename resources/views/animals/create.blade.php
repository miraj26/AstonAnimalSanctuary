@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Create a new Animal</div>
					@if($errors->any())
					<div class="alert alert-danger">
						<ul> @foreach ($errors->all() as $error)
							<li>{{ $error}}</li>
						@endforeach </ul>
					</div> <br/> @endif

					@if (\Session::has('success'))
					<div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					</div><br /> @endif

					<div class="card-body">
						<form class="form-horizontal" method="POST" action="{{url('animals')}}" enctype="multipart/form-data">
							@csrf
							<div class="col-md-8">
								<label>Animal Name</label>
								<input type="text" name="name" placeholder="Name"/>
							</div>
							<div class="col-md-8">
								<label>Date of Birth</label>
								<input type="date" name="dob" placeholder="dd/mm/yyyy" />
							</div>
							<div class="col-md-8">
								<label>Description</label>
								<input type="text" name="description" placeholder="description"/>
							</div>
							<div class="col-md-8">
								<label>Image</label>
								<input type="file" name="image" placeholder="Image file"/>
							</div>
							<div class="col-md-6 col-md-offset-4">
								<input type="submit" class="btn btn-primary"/>
								<input type="reset" class="btn btn-primary"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection