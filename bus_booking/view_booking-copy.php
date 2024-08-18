<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';




?>




<!DOCTYPE html>
<html>
<head>
	<title>Register Account</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php require 'config/header.php'; ?>

	<div class="container" style="margin-top: 110px">
		<div class="row">

			<?php require 'config/sidebar.php'; ?>

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Bus No</th>
						        <th>Route</th>
						        <th>Depeature</th>
						        <th>Arrival Time</th>
						        <th>Bus Capacity</th>
						        <th>Amount</th>
						        <th>Booking</th>
						        <th>Payment Status</th>
						        <th>Action</th>
						      </tr>
						    </thead>
						    <?php

						    	$schedule = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE email='".$_SESSION['email']."' AND status='1'");
						    	while($viewRows = mysqli_fetch_array($schedule)){

						    ?>
						    <tbody>
						      <tr>
						        <td><?php echo $viewRows['bus_no']; ?></td>
						        <td><?php echo $viewRows['route']; ?></td>
						        <td><?php echo $viewRows['depeature']; ?></td>
						        <td><?php echo $viewRows['arrival_time']; ?></td>
						        <td><?php echo $viewRows['capacity']; ?></td>
						        <td><?php echo $viewRows['amount']; ?></td>
						        <td><span class="text-success">Booked</span></td>
						        <td><?php echo $viewRows['payment_status']; ?></td>
						        <td><a href="pay.php?bookindId=<?php echo $viewRows['id']; ?>">Pay Now</a></td>
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




	<?php require 'config/footer.php'; ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>