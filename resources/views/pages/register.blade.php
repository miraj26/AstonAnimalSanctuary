<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/header.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/form.css') }}"/>
	<!--<script src="scripts/validate_password.js"></script>
	<script src="scripts/main.js"></script>-->
</head>
<body>
	<div id="container">
		<a href="{{ url('/')}}">Aston Animal Sanctuary</a>
	</div>
	<div id="main">
		<form id="register" method="POST" action="register.php">
			<input type="text" name="username" placeholder="Username" required/>	
			<input type="Password" name="password" placeholder="Password" required/>
			<input type="Password" name="confirm_pass" placeholder="Confirm Password" required/>
			<input type="text" name="email" placeholder="Email" required pattern=".+(\.co\.uk|\.com)" title="Please enter a UK or US email address."/>
			<input type="text" name="first" placeholder="First Name" required/>
			<input type="text" name="second" placeholder="Last Name" required/>
			<input type="text" name="address" placeholder="Address Line 1" required/>
			<input type="text" name="postcode" placeholder="Postcode" maxlength="8" required/>
			<input type="text" name="number" placeholder="Contact Number" maxlength="11" required/>
			<input type="hidden" name="submitted" value="true"/>
			<input type="submit" name="Submit" required/>
		</form>
	</div>
</body>
</html>