<?php
	session_start();
	$con = new mysqli("localhost", "root", "", "php_app");

	if($con->connect_error){
		die("unable to connect");
	} else {
		if(isset($_POST["upload"])){
			$count = count($_FILES["photos"]["name"]);
			$rand = rand();
			$online = $_SESSION["email"];
			$online_id = $_SESSION["user_id"];
			$caption = $_POST["caption"];
			for ($i = 0; $i < $count; $i++) {
				$tmpName = $_FILES["photos"]["tmp_name"][$i];
				if($tmpName != ""){
					$na = pathinfo($_FILES["photos"]["name"][$i], PATHINFO_EXTENSION);
					$randim = rand(10,1000000000000000);
					$newPath = $randim.".".$na;
					$uploadit = move_uploaded_file($tmpName, "photos/".$newPath);
					if($uploadit){
						$inp = $con->query("INSERT INTO posts (post_id, post_caption) VALUES ('$rand', '$caption')");
						$insert = $con->query("INSERT INTO images (imagename, user_id, post_id) VALUES ('$newPath', '$online_id', '$rand')");
						if($insert && $con){
							header("Location:profile.php");
						} else{
							echo "An error occured<br/>";
						}
					}
				}
			}
		} else {
			$_SESSION["uploaderror"] = "<span class='text-info'>Choose a file</span>";
			header("Location:profile.php");
		}
	}
?>