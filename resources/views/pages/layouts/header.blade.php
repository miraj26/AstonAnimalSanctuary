<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>{{config('app.name',Aston Animal Sanctuary)}}</title>
	<link rel="stylesheet" type="text/css" href="/css/header.css"/>
</head>
<body>
	<div id="container">
		Aston Animal Santuary
		<!--Add Logo here-->
		<a href="login.html" id="signin">Login</a>
		<a href="register.html" id="signin">Register</a>
	</div>
	<div id="main">
		@yield('content')
	</div>

</body>
</html>