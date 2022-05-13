<?php
	if(!isset($_SESSION["user_id"])){
		header("Location:profile.php");
	};

	$con = new mysqli("localhost", "root", "", "php_app");
	if($con->connect_error){
		die("an error occured");
	}else{
		$online_id = $_SESSION["user_id"];
		$fetch = $con->query("SELECT * FROM images join posts using(post_id) where user_id = '$online_id'")->fetch_all(MYSQLI_ASSOC);
	}
?>

<?php
	$count = count($fetch);
	for ($i=0; $i < $count ; $i++) {
		$image_id = $fetch[$i]["image_id"];
		$name = $fetch[$i]["imagename"];
		$postcaption = $fetch[$i]["post_caption"];
		?>
		<div class='col-4 col-md-3 mb-2'>
			<img src="<?php echo 'photos/'.$name?>" data-toggle='modal' data-target="<?php echo '#photos'.$i ?>" style='cursor:pointer' class='w-100 h-100'>
		</div>
		<div id="<?php echo 'photos'.$i ?>" class='modal fade'>
			<div class='modal-dialog'>
				<div class='modal-content m-auto'> 
					<div class='modal-header bg-light p-2'>
						<?php
						if(empty($que["profilepicsname"])){
							echo "<img style='width:40px; height:40px; border-radius:100%' src='profilepics/Customer_104px.png'>";
						} else {
							echo "<img style='width:40px; height:40px; border-radius:100%' src='profilepics/$na'>";
						}
						?>
						<span class="my-auto ml-2 small"><?php echo "$fname $lname" ?></span>
						<span class='btn close float-right btn-sm' style="outline:none">
							<span>&#8942;</span>
						</span>

						


						<!-- <span class='btn close btn-sm' data-dismiss='modal' style="outline:none">
							<span>&times;</span>
						</span> -->
					</div>
					<div class='modal-body p-0'>
						<img src="<?php echo 'photos/'.$name?>" style="max-height:80vh" class=' img-fluid'>
					</div>
					<div class='text-left bg-light rounded small p-3'>
						<?php echo $postcaption ?>
					</div>
				</div>
			</div>
		</div>
	<?php 
	}
?>