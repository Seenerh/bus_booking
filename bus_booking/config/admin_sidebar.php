	<?php
	
	$User = mysqli_query($connect, "SELECT * FROM `admin` WHERE email='".$_SESSION['email']."'");
	$viewUser = mysqli_fetch_array($User);



?>
<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item disabled">Hello, <?php echo $viewUser['fname']." ".$viewUser['lname']; ?> </a>
				  <a href="admin_dashboard.php" class="list-group-item">Dashboard</a>
				  <a href="add_user.php" class="list-group-item">Add User</a>
				  <a href="add_driver.php" class="list-group-item">Add Driver</a>
				  <a href="add_bus.php" class="list-group-item">Add Bus Schedule</a>	
				  <a href="view_booking.php" class="list-group-item">View User Booking</a>
				  <a href="view_payment.php" class="list-group-item">View Payment</a>
				  <a href="bus_schedule.php" class="list-group-item">View Bus Schedule</a>
				  <!-- <a href="view_clerk_users.php" class="list-group-item">View clerk Users</a> -->
				  <a href="view_drivers.php" class="list-group-item">View Drivers </a>
				  <a href="view_user_profile.php" class="list-group-item">View Users Profile</a>
				  
				  <a href="change_password.php" class="list-group-item">Change Password</a>
				  <a href="logout.php" class="list-group-item">Logout</a>
				</div>
			</div>
