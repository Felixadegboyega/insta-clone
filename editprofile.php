<?php
session_start();

	$con = new mysqli('localhost', 'root', '', 'php_app');
	
	if($con->connect_error){
		die("unable to connect");
	} else {
		if(isset($_POST["savep"])){
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastname"];
			$bio = $_POST["bio"];
			$onlineEmail = $_SESSION["email"];
			
			$queDb = $con->query("UPDATE user SET firstname = '$firstName', lastname = '$lastName', bio = '$bio'  where email = '$onlineEmail'");
			
			if($queDb){
				$_SESSION["editsuccessfull"] =  "<span class='text-success'>Profile Updated Successfully</span>";
				header( "Location:profile.php" );
			} else {
				$_SESSION["editunsuccessfull"] = "<span class='text-danger'>An error occured</span>";
				header( "Location:profile.php" );
			}
		};
	}

?>