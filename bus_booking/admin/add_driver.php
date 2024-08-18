<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';


	if(isset($_POST['add_user'])){

		$fname = mysqli_real_escape_string($connect, $_POST['fname']);
		$lname = mysqli_real_escape_string($connect, $_POST['lname']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$phone = mysqli_real_escape_string($connect, $_POST['phone']);
		$m_status = mysqli_real_escape_string($connect, $_POST['m_status']);
		$gender = mysqli_real_escape_string($connect, $_POST['gender']);
		$city = mysqli_real_escape_string($connect, $_POST['city']);
		$bus_name = mysqli_real_escape_string($connect, $_POST['bus_name']);
		$bus_no = mysqli_real_escape_string($connect, $_POST['bus_no']);
		$dlaciences = mysqli_real_escape_string($connect, $_POST['dlaciences']);
		$address = mysqli_real_escape_string($connect, $_POST['address']);


		if(!preg_match("/^[0-9]*$/", $phone)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Not Match </div>";
		}else

		if(strlen($phone)<11){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Limit </div>";
		}else 

		if(!preg_match("/^[0-9]*$/", $dlaciences)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Driven Licences Not Match </div>";
		}else

		if(strlen($dlaciences)<8){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Driven Licences Limit </div>";
		}




		else {
		

		$add = mysqli_query($connect, "INSERT INTO `drivers` (fname, lname, email, phone, m_status, gender, city, bus_name, bus_no, address, dlicence,  status) VALUES ('$fname', '$lname', '$email', '$phone', '$m_status', '$gender', '$city', '$bus_name', '$bus_no', '$address', '$dlaciences', '1')");
		if($add){
			header("location: admin_dashboard.php?addDriver=$user");
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
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

	<?php require '../config/header.php'; ?>

	<div class="container" style="margin-top: 110px">
		<div class="row">

			<?php require '../config/admin_sidebar.php'; ?>

			<div class="col-md-8">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<?php if(isset($_POST['add_bus'])){ echo $msg; } ?>

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Add Driver</b></h4> <hr>
				  		</div>

				  		<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required value="<?php if(isset($_POST['fname'])){ $fname; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Last Name</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required value="<?php if(isset($_POST['lname'])){ $lname; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus Name:</label>
						  			<input type="text" name="bus_name" id="bus_name" class="form-control" placeholder="Bus Name" value="<?php if(isset($_POST['bus_name'])){ $bus_name; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required value="<?php if(isset($_POST['email'])){ $email; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Phone Number:</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required value="<?php if(isset($_POST['phone'])){ $phone; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Marital Status:</label>
						  			<select class="form-control" name="m_status" id="m_status" required>
						  				<option hidden>Marital Status</option>
						  				<option value="single">Single</option>
						  				<option value="married">Married</option>
						  				<option value="disvorce">Disvorce</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Gender:</label>
						  			<select class="form-control" name="gender" id="gender" required>
						  				<option hidden>Select Gender</option>
						  				<option value="male">Male</option>
						  				<option value="female">Female</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>City:</label>
						  			<input type="text" name="city" id="city" class="form-control" placeholder="City" required value="<?php if(isset($_POST['city'])){ $city; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus No:</label>
						  			<input type="text" name="bus_no" id="bus_no" class="form-control" placeholder="Bus No" required value="<?php if(isset($_POST['bus_no'])){ $bus_no; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Driven Licence:</label>
						  			<input type="text" name="dlaciences" id="dlaciences" class="form-control" placeholder="Driven Licence" required value="<?php if(isset($_POST['dlaciences'])){ $dlaciences; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-8">
				  				<div class="form-group">
						  			<label>Contact Address:</label>
						  			<input type="text" name="address" id="address" class="form-control" placeholder="Contact Address" required value="<?php if(isset($_POST['address'])){ $address; } ?>">
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="add_user" id="add_user" class="btn btn-default pull-right" value="Add Driver">
				  		</div>
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