<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';

	$error = false;
	$errorMsg = "";


	if(isset($_POST['add_user'])){

		$fname = mysqli_real_escape_string($connect, $_POST['fname']);
		$lname = mysqli_real_escape_string($connect, $_POST['lname']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$phone = mysqli_real_escape_string($connect, $_POST['phone']);
		$gender = mysqli_real_escape_string($connect, $_POST['gender']);
		$m_status = mysqli_real_escape_string($connect, $_POST['m_status']);
		$birth = mysqli_real_escape_string($connect, $_POST['birth']);
		$address = mysqli_real_escape_string($connect, $_POST['address']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		

		if(!preg_match("/^[0-9]*$/", $phone)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Not Match </div>";
		}else

		if(strlen($phone)<11){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Phone Number Limit </div>";
		}

		else{

		$add = mysqli_query($connect, "INSERT INTO `clerk` (fname, lname, email, phone, gender, m_status, birth, address, password, status) VALUES ('$fname', '$lname', '$email', '$phone', '$gender', '$m_status', '$birth', '$address', '".md5($password)."', '1')");
		if($add){
			header("location: admin_dashboard.php?addUser=$user");
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

				  	<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Add User</b></h4> <hr>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Last Name</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Phone Number:</label>
						  			<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Gender:</label>
						  			<select name="gender" id="gender" class="form-control"  required>
						  				<option hidden>Gender</option>
						  				<option value="male">Male</option>
						  				<option value="female">Female</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Marital Status:</label>
						  			<select name="m_status" id="m_status" class="form-control"  required>
						  				<option hidden>Marital Status</option>
						  				<option value="single">Single</option>
						  				<option value="married">Married</option>
						  				<option value="divorce">Divorce</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Date of Birth:</label>
						  			<input type="date" name="birth" id="birth" class="form-control" placeholder="Contact Address" required>
						  		</div>
				  			</div>


				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Password:</label>
						  			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Address:</label>
						  			<input type="text" name="address" id="address" class="form-control" placeholder="Contact Address" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="add_user" id="add_user" class="btn btn-default pull-right" value="Add User">
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