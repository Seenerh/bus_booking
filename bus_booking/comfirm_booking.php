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

				  	<div class="form-group">
				  		<h4>Comfirm Booking Bus</h4> <hr>
				  	</div>

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
						      </tr>
						    </thead>
						    <?php

								    if(isset($_GET['route'])){

						  			$routing = $_GET['route'];
						  			

						  			$load = mysqli_query($connect, "SELECT * FROM `bus_schedules` WHERE route='$routing'");
						  			$view = mysqli_fetch_array($load);


						  			$busNo = $view['bus_no'];
						  			$route = $view['route'];
						  			$depeature = $view['depeature'];
						  			$arrival = $view['arrival_time'];
						  			$capacity = $view['capacity'];
						  			$amount = $view['amount'];
						  		}


 

						  		if(isset($_POST['booking'])){

						  			$check = mysqli_query($connect, "SELECT * FROM user_booking WHERE bus_no='$busNo'");
						  			if (mysqli_num_rows($check) < $capacity) {
							  				$seat = mysqli_num_rows($check) + 1;
							  				$_SESSION['seat']=$seat;
							  				$bid = rand(111111111, 999999999);
							  				$_SESSION['bid']=$bid;
							  				$booking = mysqli_query($connect, "INSERT INTO `user_booking` (fname, lname, email, booking_id, bus_no, route, depeature, arrival_time, capacity, amount, status,seat_no, payment_status, payment_reference)
										     VALUES ('".$viewUser['fname']."', '".$viewUser['lname']."', '".$_SESSION['email']."', '$bid', '$busNo', '$route', '$depeature', '$arrival', '$capacity', '$amount', '1','$seat', '0', '0')");
							  			if($booking){
							  				header("location: user_information.php");
							  			}else {
							  				echo "Fail";
							  			}
						  			}
						  			else{
						  				//echo "Sorry, the bus is occupied";

						  				echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sorry!</strong> the bus is occupied.</div>';
						  			}
						  		}

						    ?>	
						    <tbody>
						      <tr>
						        <td><?php echo $busNo; ?></td>
						        <td><?php echo $route; ?></td>
						        <td><?php echo $depeature; ?></td>
						        <td><?php echo $arrival; ?></td>
						        <td><?php echo $capacity; ?></td>
						        <td><?php echo $amount; ?></td>
						        <td><input type="submit" name="booking" id="booking" class="btn btn-default btn-sm" value="Comfirm Booking"></td>
						      </tr>
						    </tbody>
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