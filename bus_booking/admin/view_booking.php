<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';


	if(isset($_GET['success'])){

		$msgg = "<div class='alert alert-success'>Successfully Deleted Booking </div>";


	}


?>




<!DOCTYPE html>
<html>
<head>
	<title>Register Account</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

	<?php require '../config/header.php'; ?>

	<div class="container" style="margin-top: 110px">
		<div class="row">

			<?php require '../config/admin_sidebar.php'; ?>

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<div class="form-group">
				  		<h4>Users Booking</h4> <hr>
				  	</div>

				  	<?php if(isset($_GET['success'])){ echo $msgg; } ?>

				  	<form method="POST" action="">
				  		<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Full Name</th>
						        <th>Booking ID</th>
						        <th>Route</th>
						        <th>Depeature</th>
						        <th>Amount (NGN)</th>
						        <th>Booking</th>
						      </tr>
						    </thead>
						    <?php

						    	$schedule = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE status='1'");
						    	while($viewRows = mysqli_fetch_array($schedule)){

						    ?>
						    <tbody>
						      <tr>
						        <td><?php echo $viewRows['fname']." ".$viewRows['lname']; ?></td>
						        <td><?php echo $viewRows['booking_id']; ?></td>
						        <td><?php echo $viewRows['route']; ?></td>
						        <td><?php echo $viewRows['depeature']; ?></td>
						        <td><?php echo $viewRows['amount']; ?></td>
						        <td><span class="text-success">Booked</span> | <a href="delete_booking.php?BookingID=<?php echo $viewRows['booking_id'];?>" class="text-danger">Delete</a> </td>
						      </tr>
						    </tbody>
						    <?php } ?>
						  </table>
				  	</form>

				  </div>
				</div>
			</div>
		</div>
	</div>




	<?php require '../config/footer.php'; ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>