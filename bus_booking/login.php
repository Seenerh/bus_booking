<?php 

	
	session_start();
	ob_start();


	require 'config/conn.php';

	if(isset($_POST['login'])){

		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);


		$login = mysqli_query($connect, "SELECT * FROM `users` WHERE email='$email' OR phone='$email' AND password='".$password."'");
		$rows = mysqli_num_rows($login);

		if($rows >0){
			$_SESSION['email'] = $email;
			header("location: dashboard.php");
		}else{
			$msg = "<div class='alert alert-danger'>Invalid Email or Password</div>";
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

	<div class="container" style="margin-top: 130px">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<div style="padding: 20px">
				  			
				  		</div>

				  		<div class="form-group">
				  			<h4 class="text-center"><b>Login Account</b></h4> <hr>
				  		</div>

				  		<?php if(isset($_POST['login'])) { echo $msg; }?>

				  		<div class="row">

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Email Address:</label>
						  			<input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php if(isset($_POST['email'])){ echo $email; }?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Password:</label>
						  			<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit" name="login" id="login" class="btn btn-default pull-right btn-block" value="Login Account">

				  			<br> <br> <br>
				  			<p>If yo don't have account already click <a href="register.php">here</a> to register.</p>
				  			<!-- <a href="register.php" class="btn btn-default pull-left">Back to Register</a> -->
				  		</div>

				  		<div style="padding: 35px">
				  			
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