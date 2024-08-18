<?php
	
	$User = mysqli_query($connect, "SELECT * FROM `clerk` WHERE email='".$_SESSION['email']."'");
	$viewUser = mysqli_fetch_array($User);



?>
<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">Hello, <?php echo $viewUser['fname']." ".$viewUser['lname']; ?> </a>
				  <a href="clerk_dashboard.php" class="list-group-item">Dashboard</a>
				  <a href="clerk_profile.php" class="list-group-item">Edit Profile</a>
				  <a href="change_password.php" class="list-group-item">Change Password</a>
				  <a href="logout.php" class="list-group-item">Logout</a>
				</div>
			</div>
