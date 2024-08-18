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

			<div class="col-md-9">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">
				  		<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Full Name</th>
						        <th>Email</th>
						        <th>Phone No</th>
						        <th>Gender</th>
						        <th>Marital Status</th>
						        <th>Date of Birth</th>
						        <th>Address</th>
						      </tr>
						    </thead>
						    <?php

						    	$schedule = mysqli_query($connect, "SELECT * FROM `clerk` WHERE status='1'");
						    	while($viewRows = mysqli_fetch_array($schedule)){

						    ?>
						    <tbody>
						      <tr>
						        <td><?php echo $viewRows['fname']." ".$viewRows['lname']; ?></td>
						        <td><?php echo $viewRows['email']; ?></td>
						        <td><?php echo $viewRows['phone']; ?></td>
						        <td><?php echo $viewRows['gender']; ?></td>
						        <td><?php echo $viewRows['m_status']; ?></td>
						        <td><?php echo $viewRows['birth']; ?></td>
						        <td><?php echo $viewRows['address']; ?></td>
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




	<?php require '../config/footer.php'; ?>


	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>