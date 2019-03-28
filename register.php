<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
	<link rel="stylesheet" type="text/css" href="css/form.css"/>
	<!--<script src="scripts/validate_password.js"></script>
	<script src="scripts/main.js"></script>-->
</head>
<body>
	<div id="container">
		<a href="index.html">Aston Animal Santuary</a>
	</div>
	<div id="main">
		<form id="register" method="post" action="register.php">
			<input type="text" name="username" placeholder="Username" required/>	
			<input type="Password" name="password" placeholder="Password" required/>
			<input type="Password" name="confirm_pass" placeholder="Confirm Password" required/>
			<input type="text" name="email" placeholder="Email" required/>
			<input type="text" name="first" placeholder="First Name" required/>
			<input type="text" name="second" placeholder="Last Name" required/>
			<input type="text" name="address" placeholder="Address Line 1" required/>
			<input type="text" name="postcode" placeholder="Postcode" required/>
			<input type="text" name="number" placeholder="Contact Number" required/>
			<input type="hidden" name="submitted" value="true"/>
			<input type="submit" name="Submit" required/>
		</form>
	</div>

	<?php
		require_once('connectdb.php');

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fname = $_POST['first'];
		$lname = $_POST['second'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$contact = $_POST['number'];

		try{
			$temp = $db->prepare("INSERT INTO animalSanctuary('Username', 'Password', 'FirstName', 'LastName', 'Email', 'Address', 'Postcode', 'ContactNumber', 'Staff')" . "VALUES(?,?,?,?,?,?,?,?,?)");
			$temp->execute($username, $password, $fname, $lname, $email, $address, $postcode, $contact, false);
			echo("Completed");
		} catch (PDOException $ex){
			echo("failed to save to db");
			echo($ex->getMessage());
			exit();
		}
	?>
</body>
</html>