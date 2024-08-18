<?php 

	
	session_start();
	ob_start();
	

	if(!isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';

	if(isset($_GET['update'])){

		$msg = "<div class='alert alert-success'> Successfully Update Profile </div>";


	}

	if(isset($_GET['password'])){

		$msgg = "<div class='alert alert-success'> Successfully Update Password </div>";


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

				  	
				  	<?php if(isset($_GET['update'])){ echo $msg; }else 
				  			if(isset($_GET['password'])){ echo $msgg; }
				  	 ?>

				  	 <div class="form-group">
				  			<small class="text-danger pull-right"><b>Address::</b> Gombe State Transport Service <br> Gombe Line, <br> Gombe, Gombe State. <br> P.M.B 130.</small>

				  	</div>

				  	<div class="form-group">
				  		<b class="text-success">You are login as:: <?php echo $viewUser['fname']." ".$viewUser['lname']; ?></b>
				  	</div>


				  	 <img src="images/gombe3.jpg" class="img-responsive" style="border-radius: 4px; margin-top: 40px">

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