<?php 

	
	session_start();
	ob_start();


	require 'config/conn.php';

	$error = false;
	$errorMsg = "";

	if(isset($_POST['register'])){

		$fname = mysqli_real_escape_string($connect,$_POST['fname']);
		$lname = mysqli_real_escape_string($connect,$_POST['lname']);
		$email = mysqli_real_escape_string($connect,$_POST['email']);
		$phone = mysqli_real_escape_string($connect,$_POST['phone']);
		$password = mysqli_real_escape_string($connect,$_POST['password']);
		$cpassword = mysqli_real_escape_string($connect,$_POST['cpassword']);


		if(!preg_match("/^[0-9]*$/", $phone)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Not Match </div>";
		}else

		if(strlen($phone)<11){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Limit </div>";
		}else

		if($password != $cpassword){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Comfirm Password Not Match </div>";
		}else{


		$registerUser = mysqli_query($connect, "INSERT INTO `users` (fname, lname, email, phone, password) VALUES ('$fname', '$lname', '$email', '$phone', '".$password."')");

		if($registerUser){
			$_SESSION['email'] = $email;
			header("location: bus_schedules.php");
		}else{
			echo "Wrong";
		}

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

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-center"><b>Register Account</b></h4> <hr>
				  		</div>

				  		<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required 
						  			value="<?php if(isset($_POST['fname'])){ echo $fname; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Last Name:</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required value="<?php if(isset($_POST['lname'])){ echo $lname; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" required value="<?php if(isset($_POST['email'])){ echo $email; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Phone Number:</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required value="<?php if(isset($_POST['phone'])){ echo $phone; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Password:</label>
						  			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Comfirm :</label>
						  			<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Comfirm" required>
						  		</div>
				  			</div>
				  		</div>

				  		<div class="form-group">
				  			<a href="index.php" class="btn btn-default pull-left">Back to Home</a>
				  			<input type="submit"  name="register" id="register" class="btn btn-default pull-right" value="Register Account">
				  		</div>
				  	</form>
				  </div>
				</div>
			</div>
		</div>
	</div>




	<?php require 'config/footer.php'; ?>


</body>
</html>