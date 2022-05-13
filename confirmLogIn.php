<?php
	session_start();
	$con = new mysqli('localhost', 'root', '', 'php_app');

	if($con->connect_error){
		die("unable to connect");
	} else {
		if(isset($_POST["login"])){
			$email = $_POST["email"];
			$password = $_POST["password"];

			$que = $con->query("SELECT email, user_id, password from user where email = '$email'")->fetch_assoc();
			if($que){
				$verifypass = password_verify($password, $que["password"]);
				if($verifypass){
					$_SESSION["email"] = $que["email"];
					$_SESSION["user_id"] = $que["user_id"];
					header("Location: profile.php");
				} else {
					$_SESSION["passwordError"] = "incorrect password";
					header("Location: login.php");
				}
			} else {
				$_SESSION["emailError"] = "email does not exist";
				header("Location: login.php");
			}
		} else {
			$_SESSION["fillFormError"] = "Please fill out the form";
			header("Location: login.php");
		}
	}

?>