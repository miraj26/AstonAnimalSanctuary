<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>{{config('app.name')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pagestyle.css') }}"/>
</head>
<body>
	<!-- Navbar -->
	@include('layouts.app')
	<div id="main">
		@yield('content')
	<!-- Slideshow -->
	<div class="slide fade">
		<img src="{{ asset('images/dogslide.jpeg')}}">
		<div class="text" id="first">Adopt Now!</div>
	</div>
	<div class="slide fade">
		<img src="{{ asset('images/catslide.jpg')}}">
		<div class="text" id="second">Login to see all the pets you can adopt</div>
	</div>
	<div class="slide fade">
		<img src="{{ asset('images/guineaslide.jpg')}}">
		<div class="text" id="third">Change a pets life today!</div>
	</div>
</div>
<!-- About section -->
<div id="about">
	<b>About Us</b>
	<br/>
	<section>
			Established in 2019, Aston Pet Sanctuary has rapidly become the UK's most popular Pet Adoption website
	</section>
</div>
<!-- Controls the slideshow -->
<script src="{{ asset('js/homescript.js')}}"></script>

</body>
</html>