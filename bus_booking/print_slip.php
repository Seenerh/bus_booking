<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';


	$loadBook = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE booking_id='".$_SESSION['bid']."'");
	$bookRow = mysqli_fetch_array($loadBook);


	$loadPay = mysqli_query($connect, "SELECT * FROM `payment_booking` WHERE email='".$_SESSION['email']."'");
	$PayRow = mysqli_fetch_array($loadPay);


?>




<!DOCTYPE html>
<html>
<head>
	<title>Register Account</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php //require 'config/header.php'; ?>

	<div class="container" style="margin-top: 70px">
		<div class="row">

			<?php //require 'config/sidebar.php'; ?>

			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-center"><b>Ticket Information</b></h4> <hr>
				  		</div>

						<div class="form-group">
				  			<small class="text-danger"><b>Note:</b> lugagges are at owner's risk, no return of money after payment thanks safe journey.</small>
				  		</div>				  		

				  		<table class="table table-striped">
						    <tbody>
						      <tr>
						        <td><b>Full Name</b></td>
						        <td><?php echo $PayRow['fname']." ".$PayRow['lname']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Depeature</b></td>
						        <td><?php echo $bookRow['depeature']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Route</b></td>
						        <td><?php echo $PayRow['route']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Amount</b></td>
						        <td><?php echo $PayRow['amount']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Booking ID</b></td>
						        <td><?php echo $PayRow['booking_id']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Payment Date</b></td>
						        <td><?php echo $PayRow['payment_date']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Bus No</b></td>
						        <td><?php echo $PayRow['bus_no']; ?></td>
						      </tr>
						      <tr>
						        <td><b>Seat No.</b></td>
						        <td><?php echo $bookRow['seat_no']; ?></td>
						      </tr>
						    </tbody>
						  </table>

						  <div class="form-group">
						  	<input type="submit" class="btn btn-default btn-sm pull-right" value="Print" onclick="window.print()"></a>
						  </div>

				  		
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