<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';


	if(isset($_POST['profile'])){


		$fname = mysqli_real_escape_string($connect,$_POST['fname']);
		$lname = mysqli_real_escape_string($connect,$_POST['lname']);
		$email = mysqli_real_escape_string($connect,$_POST['email']);
		$phone = mysqli_real_escape_string($connect,$_POST['phone']);
		$birth = mysqli_real_escape_string($connect,$_POST['birth']);
		$gender = mysqli_real_escape_string($connect,$_POST['gender']);
		$m_status = mysqli_real_escape_string($connect,$_POST['m_status']);
		$city = mysqli_real_escape_string($connect,$_POST['city']);
		$address = mysqli_real_escape_string($connect,$_POST['address']);
		$nok_names = mysqli_real_escape_string($connect,$_POST['nok_names']);
		$nok_phone = mysqli_real_escape_string($connect,$_POST['nok_phone']);


		$profile = mysqli_query($connect, "INSERT INTO `user_profile` (fname, lname, email, phone, gender, m_status, address, city, nok_names, nok_phone, status) VALUES 
			('$fname', '$lname', '".$_SESSION['email']."', '$phone', 
			'$gender', '$m_status', '$address', '$city', '$nok_names', '$nok_phone',  '1')");
		if($profile){
			header("location: view_booking.php");
		}else{
			echo "Wrong";
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
				  			<h4 class="text-left"><b>Create Profile</b></h4> <hr>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $viewUser['fname']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Last Name:</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $viewUser['lname']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Next of Kin Names:</label>
						  			<input type="text" name="nok_names" id="nok_names" class="form-control" placeholder="Next of Kin Names" value="<?php if(isset($_POST['nok_names'])){ echo $nok_names; } ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $viewUser['email']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Phone Number</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $viewUser['phone']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Next of Kin Phone</label>
						  			<input type="text" name="nok_phone" id="nok_phone" class="form-control" placeholder="Next of Kin Phone" value="<?php echo $viewUser['nok_phone']; ?>"  required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Gender</label>
						  			<select class="form-control" name="gender" id="gender" required>
						  				<option hidden>Select Gender</option>
						  				<option value="<?php if(isset($_POST['gender'])){ echo $gender; } ?>"><?php if(isset($_POST['gender'])){ echo $gender; } ?></option>
						  				<option value="Male">Female</option>
						  				<option value="Female">Male</option>
										<option value="Other">Other</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
				  					<label>Marital Status</label>
						  			<select class="form-control" name="m_status" id="m_status" required>
						  				<option hidden></option>-->
						  				<option value="<?php if(isset($_POST['m_status'])){ echo $m_status; } ?>"><?php if(isset($_POST['m_status'])){ echo $m_status; } ?></option>
						  				<option value="Single">Single</option>
						  				<option value="Married">Married</option>
						  				<option value="Disvorce">Disvorce</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>City:</label>
						  			<input type="text" name="city" id="city" class="form-control" placeholder="City" required value="<?php if(isset($_POST['city'])){ echo $city; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Contact Address:</label>
						  			<input type="text" name="address" id="address" class="form-control" placeholder="Contact Address" required value="<?php if(isset($_POST['address'])){ echo $address; } ?>" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="profile" id="profile" class="btn btn-default pull-right" value="Save Profile">
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