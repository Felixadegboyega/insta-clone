<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<title>Sign Up</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="height: 100vh;">
			<div class="col-12 col-xl-5 p-0 m-auto card small" style="max-width:350px">
				<div class="card-header">
					<h4>Likzjoiy</h4>
				</div>
				<form action="confirmSignUp.php" class="card-body my-auto p-3" method="post">
					<div class="row">
					<h5 class="ml-3">Sign Up</h5>
						<div class="col-12 text-danger">
							<?php
								session_start();
								if(isset($_SESSION["regUnSucc"])){
									echo $_SESSION["regUnSucc"];
								}
							?>
						</div>
						<div class="form-group col-12">
							<label for="">First Name</label>
							<input type="text" name="firstName" class="w-100 form-control" required>
						</div>
						<div class="form-group col-12">
							<label for="">Last Name</label>
							<input type="text" name="lastName" class="form-control" required>
						</div>
						<div class="form-group col-12">
							<label for="">Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group col-12">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<button class="btn-block btn-outline-primary btn-sm btn m-3" name="submit">Submit</button>
						<span class="ml-3">Have an Account, <a href="login.php">Login</a> </span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php session_unset(); ?>