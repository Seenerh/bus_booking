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

	if(isset($_GET['addUser'])){

		$msgg = "<div class='alert alert-success'> Successfully Add User </div>";


	}

	if(isset($_GET['addDriver'])){

		$msgg = "<div class='alert alert-success'> Driver Added Successfully </div>";


	}


	$loadPay = mysqli_query($connect, "SELECT * FROM `payment_booking` WHERE booking_id='$check' AND status='1'");
	$loadRow = mysqli_fetch_array($loadPay);



	if(isset($_POST['checkUser'])){

		$check = $_POST['check'];


		$ticket = mysqli_query($connect, "SELECT 1 FROM `user_booking` WHERE booking_id='$check' AND status='1'");
		$row = mysqli_num_rows($ticket);

		if($row>0){

			$detail = '<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<div class="form-group">
				  		<div class="alert alert-success">Successfully Verify User</div>
				  	</div>
				  	 
				  	 <table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Firstname</th>
					        <th>Lastname</th>
					        <th>Booking ID</th>
					        <th>Amount</th>
					        <th>Route</th>
					        <th>Depeature</th>
					        <th>status</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>July</td>
					        <td>Dooley</td>
					        <td>july@example.com</td>
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

			<?php require '../config/admin_sidebar.php'; ?>

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">
				  	
				  	<?php if(isset($_GET['update'])){ echo $msg; }else 
				  			if(isset($_GET['password'])){ echo $msgg; } else if(isset($_GET['addUser'])){ echo $msgg; }else if(isset($_GET['addDriver'])){ echo $msgg; }
				  	 ?>

				  	 <?php if(isset($msg)) { echo $msg; } ?>

				  	 
				  	 <div class="form-group">
				  			<small class="text-danger pull-right"><b>Address::</b> Gombe State Transport Service <br> Gombe Line, <br> Gombe, Gombe State. <br> P.M.B 130.</small>

				  	</div>

				  	<div class="form-group">
				  		<b class="text-success">You are login as:: <?php echo $viewUser['fname']." ".$viewUser['lname']; ?></b>
				  	</div>


				  	 <img src="../images/gombe3.jpg" class="img-responsive" style="border-radius: 4px; margin-top: 40px">

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