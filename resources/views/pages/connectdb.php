<?php
	try{
		echo "test";
		$db = new PDO("mysql:dbname=animalSanctuary;host=127.0.0.1:8889","miraj","123");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $ex){
		echo "Database error occurred. Please try again" . "<br/>" . $ex->getMessage();
		exit;
	}
?>