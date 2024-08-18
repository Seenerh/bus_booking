<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';


	if(isset($_POST['cancel'])){

		$cancel = mysqli_query($connect, "UPDATE `user_booking` SET status='0' WHERE email='".$_SESSION['email']."'");
		if($cancel){
			$msg = "<div class='alert alert-success'><b>Success</b> Cancel Bus Booking</div>";
		}else {
			echo "Wrong Code";
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

				  	<div class="form-group">
				  		<h4>Cancel Ticket</h4> <hr>
				  	</div>

				  	<?php if(isset($_POST['cancel'])){ echo $msg; }?>
				  	
				  	<form method="POST" action="">

				  		<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						         <h4 class="modal-title">Comfirmation</h4>
						      </div>
						      <div class="modal-body">
						        <p class="text-danger text-center"><b>Are you sure want to cancel Bus ticket note: no return of money after payment.</b></p>
						      </div>
						      <div class="modal-footer">
						      	<button type="submit" class="btn btn-danger" name="cancel" id="cancel">Yes</button>
						        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						      </div>
						    </div>

						  </div>
						</div>



				  		<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Bus No</th>
						        <th>Route</th>
						        <th>Depeature</th>
						        <th>Arrival Time</th>
						        <th>Bus Capacity</th>
						        <th>Amount</th>
						        <th>Cancel Ticket</th>
						      </tr>
						    </thead>
						    <?php

						    	$schedule = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE email='".$_SESSION['email']."' AND status='1'");
						    	while($viewRows = mysqli_fetch_array($schedule)){

						    ?>
						    <tbody>
						      <tr>
						        <td><?php echo $viewRows['bus_no']; ?></td>
						        <td><?php echo $viewRows['route']; ?></td>
						        <td><?php echo $viewRows['depeature']; ?></td>
						        <td><?php echo $viewRows['arrival_time']; ?></td>
						        <td><?php echo $viewRows['capacity']; ?></td>
						        <td><?php echo $viewRows['amount']; ?></td>
						        <td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">Cancel Ticket</button>
</td>
						      </tr>
						    </tbody>
						    <?php } ?>
						  </table>
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