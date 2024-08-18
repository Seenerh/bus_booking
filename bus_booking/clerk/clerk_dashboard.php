<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';

	if(isset($_GET['update'])){

		$msg = "<div class='alert alert-success'> Successfully Update Profile </div>";


	}

	if(isset($_GET['password'])){

		$msgg = "<div class='alert alert-success'> Successfully Update Password </div>";


	}


	$loadPay = mysql_query("SELECT * FROM `payment_booking` WHERE booking_id='$check' AND status='1'");
	$loadRow = mysql_fetch_array($loadPay);



	if(isset($_POST['checkUser'])){

		$check = $_POST['check'];


		$ticket = mysql_query("SELECT * FROM `payment_booking` WHERE booking_id='$check' AND status='1'");
		$row = mysql_num_rows($ticket);

		if($row>0){

			$loadData = mysql_query("SELECT * FROM `payment_booking` WHERE booking_id='$check' AND status='1'");
			$view = mysql_fetch_array($loadData);

			$detail = '<div class="col-md-9 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 30px">

				  	<div class="form-group">
				  		<div class="alert alert-success">Successfully Verify User</div>
				  	</div>
				  	 
				  	 <table class="table table-striped" style="font-size: 12px;">
					    <thead>
					      <tr>
					        <th>Full Name</th>
					        <th>Bookig ID</th>
					        <th>Amount</th>
					        <th>Route</th>
					        <th>Payment Date</th>
					        <th>Bus No</th>
					        <th>status</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>'.$view['fname'].' '.$view['lname'].'</td>
					        <td>'.$view['booking_id'].'</td>
					        <td>'.$view['amount'].'</td>
					        <td>'.$view['route'].'</td>
					        <td>'.$view['payment_date'].'</td>
					        <td>'.$view['bus_no'].'</td>
					        <td><span class"text-success">Success Payment</span></td>
					      </tr>
					    </tbody>
					  </table>

				  </div>
				</div>
			</div>';
		}else {

			$msg = "<div class='alert alert-danger'> Not Record Found </div>";
		}
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

			<?php require '../config/clerk_sidebar.php'; ?>

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<div class="form-group">
				  		<h4>Check Ticket</h4> <hr>
				  	</div>
				  	
				  	<?php if(isset($_GET['update'])){ echo $msg; }else 
				  			if(isset($_GET['password'])){ echo $msgg; }
				  	 ?>

				  	 <?php if(isset($msg)) { echo $msg; } ?>

				  	 
				  	 <form method="POST" action="">
				  	 	<div class="form-group">
				  	 		<input type="text" name="check" id="check" class="form-control" placeholder="Booking ID">
				  	 	</div>

				  	 	<div class="form-group">
				  	 		<input type="submit" name="checkUser" id="checkUser" class="btn btn-default pull-right" value="Check User">
				  	 	</div>
				  	 </form>

				  </div>
				</div>
			</div>

			<?php if(isset($detail)) { echo $detail; } ?>
		</div>
	</div>




	<?php require '../config/footer.php'; ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>