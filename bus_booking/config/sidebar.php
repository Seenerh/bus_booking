<?php
	
	$User = mysqli_query($connect, "SELECT * FROM `users` WHERE (email='".$_SESSION['email']."' OR phone='".$_SESSION['email']."') ");
	$viewUser = mysqli_fetch_array($User);



?>
<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item disabled"><b>Hello, <?php echo $viewUser['fname']." ".$viewUser['lname']; ?> </b></a>
				  <a href="dashboard.php" class="list-group-item">Dashboard </a>
				  <a href="bus_schedules.php" class="list-group-item">View Bus Schedules</a>
				  <a href="view_booking.php" class="list-group-item">View Booking</a>
				  <!-- <a href="view_payment.php" class="list-group-item">View Payment</a> -->
				  <a href="view_profile.php" class="list-group-item">Edit Profile </a>
				  
				  
				  <a href="cancel_booking.php" class="list-group-item">Cancel Ticket</a>
				  <a href="change_password.php" class="list-group-item">Change Password</a>
				  <a href="logout.php" class="list-group-item">Logout</a>
				</div>
			</div>
