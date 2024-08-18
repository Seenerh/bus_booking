<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';




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

			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<div class="form-group">
				  		<h4>View Message</h4> <hr>
				  	</div>

				  	<?php 

				  		if(isset($_GET['email'])){

						  			$GetMail = $_GET['email'];
						  			

						  			$load = mysqli_query($connect, "SELECT * FROM `feedback` WHERE email='$GetMail'");
						  			$view = mysqli_fetch_array($load);

						  			
						  		}

				  	?>

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<label>Message:</label>
				  			<input type="text" rows="6" cols="6" class="form-control text-left" value="<?php echo $view['message']; ?>">
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