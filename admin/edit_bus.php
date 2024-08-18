<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';


								    if(isset($_GET['route'])){

						  			$routing = $_GET['route'];
						  			

						  			$load = mysqli_query($connect, "SELECT * FROM `bus_schedules` WHERE route='$routing'");
						  			$view = mysqli_fetch_array($load);

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

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<?php if(isset($_POST['edit_bus'])){ echo $msg; } ?>

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Edit Bus</b></h4> <hr>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus No:</label>
						  			<input type="text" name="bus_no" id="bus_no" class="form-control" placeholder="Bus No" value="<?php echo $view['bus_no']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus Name</label>
						  			<input type="text" name="bus_name" id="bus_name" class="form-control" placeholder="Bus Name" value="<?php echo $view['bus_name']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Route:</label>
						  			<input type="text" name="route" id="route" class="form-control" placeholder="Route" value="<?php echo $view['route']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Depeature:</label>
						  			<input type="text" name="depeature" id="depeature" class="form-control" placeholder="Depeature" value="<?php echo $view['depeature']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Capacity:</label>
						  			<input type="text" name="capacity" id="capacity" class="form-control" placeholder="Capacity" value="<?php echo $view['capacity']; ?>" required>
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Amount</label>
						  			<input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="<?php echo $view['amount']; ?>" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="edit_bus" id="edit_bus" class="btn btn-default pull-right" value="Edit Bus">
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