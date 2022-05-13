<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<title>Login</title>
</head>
<body class="">
	<div class="container-fluid">
		<div class="row" style="height:100vh">
			<div class="col-12 col-md-6 m-auto card p-0" style="max-width:350px">
				<div class="card-header">
					<h3 class="card-title">Likzjoiy</h3>
				</div>
				<form class="card-body" action="confirmLogIn.php" method="post">
					<h5 class="card-title">Login</h5>
					<div class="mb-1">
						<?php
							session_start();
							if(isset($_SESSION["passwordError"])){
								echo "<span class='text-danger'>Incorrect Password</span>";
							};
							if(isset($_SESSION["emailError"])){
								echo "<span class='text-danger'>Account does not exist</span>";
							};
							if(isset($_SESSION["regSucc"])){
								echo $_SESSION["regSucc"];
							};
							if(isset($_SESSION["fillFormError"])){
								echo "<span class='text-danger'>Please fill out the Form</span>";
							}
						?>
					</div>
					<input type="email" name="email" class="mb-3 form-control">
					<input type="password" name="password" class="mb-3 form-control"><hr>

					<button class=" btn btn-primary btn-block" name="login">Login</button> <hr>
					<small class="ml-2">Don't have an Account, <a href="signup.php">Sign up</a> </small>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	if(!isset($_SESSION["email"])){
		session_unset();
	}
?>