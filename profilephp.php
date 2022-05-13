<?php

session_start();
if(!isset($_SESSION["email"])){
	header("Location:login.php");
};
$con = new mysqli('localhost', 'root', '', 'php_app');
if($con->connect_error){
	die("unable to connect");
} else {

	$onlineEmail = $_SESSION["email"];
	$que = $con->query("SELECT profilepicsname, firstname, lastname, bio from user where email = '$onlineEmail'")->fetch_assoc();

	
	if($que){
		$na =  $que['profilepicsname'];
		$fname = $que['firstname'];
		$lname = $que['lastname'];
		$bio = $que['bio'];
	} else{
		echo "An error occur";
	}	


	$online_id = $_SESSION["user_id"];	
	$fetch = $con->query("SELECT * FROM images where user_id = '$online_id'")->fetch_all();
	$count = count($fetch);


	if(isset($_POST["save"])){
		$na = pathinfo($_FILES["profilePics"]["name"], PATHINFO_EXTENSION);
		$randim = rand(10,1000000000000000);
		$profilePicsName = $randim.".".$na;
		// $profilePicsName = $_FILES["profilePics"]["name"];
		if($profilePicsName != ""){
			$profilePicsTmpName = $_FILES["profilePics"]["tmp_name"];
			
			$queDb = $con->query("UPDATE user SET profilepicsname = '$profilePicsName' where email = '$onlineEmail'");
			
			if($queDb){
				move_uploaded_file($profilePicsTmpName, "profilepics/" . $profilePicsName);
				// echo "<span class='text-success'>Uploaded Successfully</span>";
				header( "refresh:1;url=profile.php" );
			} else {
				// echo "<span class='text-danger'>An error occured</span>";
				header( "refresh:2;url=profile.php" );
			}
		} else {
			echo "<span class='text-danger'>Choose a Photo</span>";
			header( "refresh:3;url=profile.php" );
		}
	};
}

?>