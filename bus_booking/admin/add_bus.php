<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';


	if(isset($_POST['add_bus'])){

		$busNo = mysqli_real_escape_string($connect,$_POST['bus_no']);
		$busName = mysqli_real_escape_string($connect,$_POST['bus_name']);
		$route = mysqli_real_escape_string($connect,$_POST['route']);
		$depeature = mysqli_real_escape_string($connect,$_POST['depeature']);
		$capacity = mysqli_real_escape_string($connect,$_POST['capacity']);
		$arrival = mysqli_real_escape_string($connect,$_POST['arrival']);
		$amount = mysqli_real_escape_string($connect,$_POST['amount']);


		$add = mysqli_query($connect, "INSERT INTO `bus_schedules` (bus_no, bus_name, route, depeature, arrival_time, capacity, amount, status) VALUES ('$busNo', '$busName', '$route', '$depeature', '$arrival', '$capacity', '$amount', '1')");
		if($add){
			$msg = "<div class='alert alert-success'> Successfullly Add Bus </div>";
		}else{

			echo "Wrong";
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

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	

				  	<form method="POST" action="">
				  		<div class="form-group">
				  			<h4 class="text-left"><b>Add Bus Schedule</b></h4> <hr>
				  		</div>

				  		<?php if(isset($_POST['add_bus'])){ echo $msg; } ?>

				  		<div class="row">
				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus No:</label>
						  			<input type="text" name="bus_no" id="bus_no" class="form-control" placeholder="Bus No" required value="<?php if(isset($_POST['bus_no'])){ echo $busNo; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Bus Name</label>
						  			<input type="text" name="bus_name" id="bus_name" class="form-control" placeholder="Bus Name" required value="<?php if(isset($_POST['bus_name'])){ echo $busName; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Route:</label>
						  			<input type="text" name="route" id="route" class="form-control" placeholder="Route" required value="<?php if(isset($_POST['route'])){ echo $route; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-3">
				  				<div class="form-group">
						  			<label>Depeature:</label>
						  			<input type="text" name="depeature" id="depeature" class="form-control" placeholder="Depeature" required value="<?php if(isset($_POST['depeature'])){ echo $depeature; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-3">
				  				<div class="form-group">
						  			<label>Capacity:</label>
						  			<input type="text" name="capacity" id="capacity" class="form-control" placeholder="Capacity" required value="<?php if(isset($_POST['capacity'])){ echo $capacity; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-3">
				  				<div class="form-group">
						  			<label>Arrival Times:</label>
						  			<input type="text" name="arrival" id="arrival" class="form-control" placeholder="Arrival Time" required value="<?php if(isset($_POST['arrival'])){ echo $busNo; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-3">
				  				<div class="form-group">
						  			<label>Amount</label>
						  			<input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" required>
						  		</div>
				  			</div>

				  		</div>

				  		<div class="form-group">
				  			<input type="submit"  name="add_bus" id="add_bus" class="btn btn-default pull-right" value="Add Bus Schedule">
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