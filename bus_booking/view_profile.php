<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';

	$error = false;
	$errorMsg = "";


	$loadData = mysqli_query($connect,"SELECT * FROM `user_profile` WHERE email='".$_SESSION['email']."'");
	$dataUser = mysqli_fetch_array($loadData);


	if(isset($_POST['Update_profile'])){


		$fname = mysqli_real_escape_string($connect, $_POST['fname']);
		$lname = mysqli_real_escape_string($connect, $_POST['lname']);
		$nok_names = mysqli_real_escape_string($connect, $_POST['nok_names']);

		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$phone = mysqli_real_escape_string($connect, $_POST['phone']);
		$nok_phone = mysqli_real_escape_string($connect, $_POST['nok_phone']);

		$gender = mysqli_real_escape_string($connect, $_POST['gender']);
		$m_status = mysqli_real_escape_string($connect, $_POST['m_status']);
		$city = mysqli_real_escape_string($connect, $_POST['city']);
		$address = mysqli_real_escape_string($connect, $_POST['address']);

		if(strlen($phone)<11){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Limit </div>";
		}else 

		if(!preg_match("/^[0-9]*$/", $phone)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Not Match </div>";
		}else{

		$Update_profile = mysqli_query($connect, "UPDATE `user_profile` SET fname='$fname', lname='$lname', nok_names='$nok_names', email='$email', phone='$phone', nok_phone='$nok_phone', gender='$gender', m_status='$m_status', address='$address', city='$city' WHERE email='".$_SESSION['email']."'");
		if($Update_profile){
			header("location: dashboard.php?update=$succ");
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

			<?php require 'config/sidebar.php'; ?>

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Edit Profile</b></h4> <hr>
				  		</div>

				  		<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $dataUser['fname']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Last Name:</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $dataUser['lname']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Next of kin Names:</label>
						  			<input type="text" name="nok_names" id="nok_names" class="form-control" placeholder="Next of kin Names" value="<?php echo $dataUser['nok_names']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $dataUser['email']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Phone Number</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $dataUser['phone']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Next of kin Phone</label>
						  			<input type="text" name="nok_phone" id="nok_phone" class="form-control" placeholder="Next of kin Phone" value="<?php echo $dataUser['nok_phone']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Gender</label>
						  			<select class="form-control" name="gender" id="gender" required>
						  				<option value="<?php echo $dataUser['gender']; ?>"><?php echo $dataUser['gender']; ?></option>
										  <option value="male">Male</option>
						  				  <option value="female">Female</option>
										  <option value="male">Others</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
				  					<label>Marital Status</label>
						  			<select class="form-control" name="m_status" id="m_status" required>
						  				<option value="<?php echo $dataUser['m_status']; ?>"><?php echo $dataUser['m_status']; ?></option>
						  				<option value="single">Single</option>
						  				<option value="married">Married</option>
						  				<option value="disvorce">Disvorce</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Other Name:</label>
						  			<input type="text" name="city" id="city" class="form-control" placeholder="Empty" value="<?php echo $dataUser['city']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Contact Address:</label>
						  			<input type="text" name="address" id="address" class="form-control" placeholder="Contact Address" value="<?php echo $dataUser['address']; ?>" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="Update_profile" id="Update_profile" class="btn btn-default pull-right" value="Update Profile">
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