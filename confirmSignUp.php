<?php

	session_start();
	$connectToDb = new mysqli('localhost', 'root', "", "php_app");

	if($connectToDb->connect_error){
		die("unable to connect");
	} else {
		if(isset($_POST["submit"])){
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$email = $_POST["email"];
			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

			$insertIntoDb = $connectToDb->query("INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')");

			if($insertIntoDb){
				$_SESSION["regSucc"] = "Registration successfull, you can now Login";
				header("Location: login.php");
			} else {
				$_SESSION["regUnSucc"] = "An error occured";
				header("Location: signUp.php");
			}
		} else {
			$_SESSION["fillError"] = "fill in your info";
			header("Location: signUp.php");
		}
	}

?>