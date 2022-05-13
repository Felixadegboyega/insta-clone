<div class="container-fluid shadow-sm bg-light sticky-top" >
	<nav class="navbar container navbar-expand-sm navbar-light sticky-top" style="height:55px">
		<a href="home.php" class="navbar-brand p-md-5">Likzjoiy</a>
		
		<div id="topnav" class=" collapse navbar-collapse" >
			<input class="form-control ml-auto" type="text" style="width:250px; box-shadow:none">
			<ul class="navbar-nav ml-auto mt-2 mr-md-4" style="height:55px; width:300px">
				<li class="nav-item active">
					<a class="nav-link" href="home.php">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Item 1 </span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Item 1</span></a>
				</li>
				<li class="nav-item">
					<button class="nav-link btn rounded-circle shadow-sm" data-target="#profileCollapse" data-toggle="collapse" aria-disabled="true">OO</button>
					<div id="profileCollapse" class="mt-3 shadow-sm rounded bg-white collapse border" style="margin-left:-30px">
						<ul class="pl-0">
							<li class="ml-3 mr-3 list-unstyled nav-item">
								<a class="nav-link" href="profile.php">Profile</a>
							</li>
							<li class="ml-3 mr-3 list-unstyled nav-item">
								<a class="nav-link" href="#">Link</a>
							</li><hr>
							<li class="ml-3 mr-3 list-unstyled nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>

<span class="navbar-toggler-icon float-right text-right rounded shadow-sm mt-3 border ml-auto mr-3 d-sm-none fixed-top" data-toggle="collapse" data-target="#menu"></span>
			<div class="col-12 d-sm-none bg-white fixed-top h-100 bg-danger ml-auto shadow collapse" id="menu" style="width:fit-content">
				<div class="text-left">
					<ul class="p-0">
						<li class="list-unstyled text-right"><span class="mt-3 border navbar-toggler-icon text-right mb-3" data-toggle="collapse" data-target="#menu"></span></li>
						<li class="p-1 list-unstyled">
							<a href='logout.php' class=''>Home</a>
						</li>
						<li  data-toggle='modal' data-target='#editprofile' class="p-1  list-unstyled">Edit Profile</li>
						<hr>
						<li class="p-1 list-unstyled">
							<a href='logout.php' class=''>Log Out</a>
						</li>
					</ul>
				</div>
			</div>