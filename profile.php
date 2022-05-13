
<?php
	require("profilephp.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.css">
	<script src="../bootstrap-4.5.0-dist/js/jquery.js"></script>
	<script src="../bootstrap-4.5.0-dist/js/bootstrap.js"></script>
	<title>Profile</title>
</head>
<style>
	.file{
		height:unset;
		overflow:hidden;
	}
	.profilepics{
		cursor:pointer
	}
</style>
<body>
	<?php require("navbar.php") ?>


	<div class="container">
		<div class="row text-center navbar-light p-md-4 pt-1">

			<div class="col-md-10 col-lg-7 offset-lg-1 pb-4 col-12 mb-2">
				<div class='row p-0'>
					<div class='col-6 p-0 col-sm-6 mb-2'>
						
						<div class='m-2'>
							<?php
								if(empty($que["profilepicsname"])){
									echo "<img class='profilepics' data-toggle='modal' data-target='#profilepicture' style='width:120px; height:120px; border-radius:100%' src='profilepics/Customer_104px.png'>";
								} else {
									echo "<img class='profilepics' data-toggle='modal' data-target='#profilepicture' style='width:120px; height:120px; border-radius:100%' src='profilepics/$na'>";
								}
							?>
						</div>
						<div class='m-2'><?php echo "$fname $lname" ?></div>
						<!-- <a href='logout.php' class='d-none d-sm-inline btn btn-sm btn-secondary'>Log Out</a> -->
					</div>
					<div class='col-6 ml-0 m-sm-auto col-sm-6 text-left pl-1' style="height:fit-content">
						<div class="mb-3 ">
							<?php
								if(isset($_SESSION["editsuccessfull"])){
									echo $_SESSION["editsuccessfull"];
									$_SESSION["editsuccessfull"] = "";
								} 
								if (isset($_SESSION["editunsuccessfull"])){
									echo $_SESSION["editunsuccessfull"];
									$_SESSION["editunsuccessfull"] = "";
								}
							?>
						</div>	

						<button class='d-none d-sm-inline btn btn-outline-secondary btn-sm mb-4' data-toggle='modal' data-target='#editprofile'>Edit Profile</button>


						<ul class="nav text-center small mr-auto" style="width:fit-content">
							<li class="nav-item m-0 p-0">
								<a class="nav-link text-muted m-0 pl-0 active" href="#">
									<b>
										<?php echo $count; ?>
									</b><br class="d-sm-none">Post</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted p-2" href="#"><b></b><br class="d-sm-none">Followers</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted p-2 m-0 pr-0" href="#"><b></b><br class="d-sm-none">Following</a>
							</li>
						</ul><br>

						<div class="text-left small"> <?php echo $bio?></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<hr/>
			</div>

			
			<script src="posts.js"></script>
			<div class="col-12 mb-3">
				<div class="row">
					<div class="col-4">
						<button class="btn btn-sm shadow-sm btn-light" onClick="seepost()">Posts</button>
					</div>
					<div class="col-4">
						<button class="btn btn-sm shadow-sm bg-light">Saved</button>
					</div>
					<div class="col-4">
						<button class="btn btn-sm shadow-sm bg-light" onClick="upload()">New Post</button>
					</div>
				</div>
			</div>



			<!-- will upload photos here -->
			<div class="col-12 mx-auto p-1 border rounded" style="display:none;max-width:500px" id="upload">
				<form action="uploadprocess.php" enctype="multipart/form-data" class="text-left rounded shadow-sm p-3" method="post">
					<h6 class="mb-4">Upload New Photo</h6> <hr>
					<div>
						<?php
							if(isset($_SESSION["uploaderror"])){
								echo $_SESSION["uploaderror"];
								$_SESSION["uploaderror"] = "";
							}
						?>
					</div>
					<div class="form-group">
						<label for="">Choose photo</label>
						<input required type="file" multiple="multiple" style="height:unset" name="photos[]" class="p-0 form-control m-2">
					</div>
					<div class="form-group">
						<label for="">Image Caption</label>
						<textarea class="form-control m-2" name="caption" placeholder="Write your caption here"></textarea>
					</div>
					<button class="btn btn-primary m-2 btn-block" type="submit" name="upload">Upload</button>
				</form>
			</div>


			<!-- will see post here -->
			<div id="seepost" class="col-12 p-2 mt-3 shadow-sm">
				<div class="row">
					<?php require("seepost.php"); ?>
				</div>
			</div>




		</div>

		<div class="row">
			<!-- modals here -->

			<!-- modal for edit profile -->

			<div class="modal fade" id="editprofile" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-dialogue-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Profile</h5>
							<button type="button" class="close" data-dismiss="modal" style='outline:none'>
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="editprofile.php" method="post" class="modal-body p-1">
							<div class="form-group col-12 col-md-5 d-inline-block">
								<label for="">First Name</label>
								<?php echo "<input type='text' name='firstName' value='$fname' class='form-control' required>"?>
							</div>
							<div class="form-group col-12 col-md-5 float-right d-inline-block">
								<label for="">Last Name</label>
								<?php echo "<input type='text' name='lastname' value='$lname' class='form-control' required>"?>
							</div>
							<div class="form-group col-12 d-inline-block">
								<label for="">Bio</label>
								<?php echo "<textarea style='min-height:150px' name='bio' class='form-control' required>$bio</textarea>"?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn-sm btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn-sm btn btn-primary" name="savep">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- modal for profile pics -->
			
			<div class="modal mx-auto fade" id="profilepicture" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content col-md-7 col-11  mx-auto">
						<div class="modal-header p-2">
							<h6 class="modal-title">Update your Profile Photo</h6>
							<button type="button" class="close" data-dismiss="modal" style='outline:none'>
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="profile.php" method="post" enctype="multipart/form-data" style="width:fit-content; height:fit-content" class="modal-body pf mx-auto p-2">	
							<input type="file" class="w-100 mb-2 p-0 form-control file" name="profilePics">
							<div class=" p-0 pt-1">
								<button class="float-right btn btn-ouline-primary btn-sm btn-danger" name="save">Save</button>
								<button type="button" class="float-right btn-sm btn btn-secondary mr-2" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
			</div>


		</div>
	</div>
</body>
</html>