<?php 

	
	session_start();
	ob_start();

	require 'config/conn.php';


	if(isset($_POST['send'])){


		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];


		$sendTo = mysqli_query($connect, "INSERT INTO `feedback` (fullName, email, phone, message, date) VALUES ('$fullName', '$email', '$phone', '$message', '".date('d-m-y')."')");
		if($sendTo){
			$msg = "<div class='alert alert-success'>Success Send Message </div>";
		}else{
			echo "Not Sending";
		}




	}


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

			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<?php if(isset($_POST['send'])) { echo $msg; }?>

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Send Message</b></h4> <hr>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Full Name:</label>
						  			<input type="text" name="fullName" id="fullName" class="form-control" placeholder="Full Name" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Phone Number:</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Comfirm Password:</label>
						  			<textarea class="form-control" name="message" id="message" rows="5" cols="3">
						  				Messages
						  			</textarea>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="send" id="send" class="btn btn-default pull-right" value="Send Messages">
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