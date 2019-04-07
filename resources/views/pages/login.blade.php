<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/header.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}"/>
</head>
<body>
	<div id="container">
		<a href="{{ url('/')}}">Aston Animal Santuary</a>
	</div>
	<div id="main">
		<form method="POST" action="">
			<input type="text" name="username" placeholder="Username" required/>	
			<input type="Password" name="password" placeholder="Password" required/>
			<input type="submit" name="Login">
		</form>
	</div>
</body>
</html>