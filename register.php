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
			$temp = $db->prepare("INSERT INTO Users(Username, Password, FirstName, LastName, Email, Address, Postcode, ContactNumber, Staff) VALUES(?,?,?,?,?,?,?,?,?)");
			$temp->execute([$username, $password, $fname, $lname, $email, $address, $postcode, $contact, 0]);
		} catch (PDOException $ex){
			echo("failed to save to db");
			echo($ex->getMessage());
			exit();
		}
	?>