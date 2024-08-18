<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';

	$error = false;
	$errorMsg = "";


	$loadData = mysql_query("SELECT * FROM `clerk` WHERE email='".$_SESSION['email']."'");
	$dataUser = mysql_fetch_array($loadData);


	if(isset($_POST['Update_password'])){


		$password = mysql_real_escape_string($_POST['password']);
		$cpassword = mysql_real_escape_string($_POST['cpassword']);

		if($password != $cpassword){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Comfirm Password Not Match </div>";
		}else{
		

		$Update_password = mysql_query("UPDATE `clerk` SET password='".md5($password)."' WHERE email='".$_SESSION['email']."' ");
		if($Update_password){
			header("location: clerk_dashboard.php");
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

			<?php require '../config/clerk_sidebar.php'; ?>

			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Change Password</b></h4> <hr>
				  		</div>

				  		<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $dataUser['email']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>New Password:</label>
						  			<input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Comfirm Password:</label>
						  			<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Comfirm Password" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="Update_password" id="Update_password" class="btn btn-default pull-right" value="Update Password">
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