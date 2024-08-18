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

				  	<div class="form-group">
				  		<h4>FeedBack Messages</h4> <hr>
				  	</div>

				  	<?php if(isset($_GET['status'])){ echo "<div class='alert alert-success'>Success Deleted</div>";} ?>

				  	<form method="POST" action="">
				  		<table class="table table-striped">
						    <thead>
						      <tr>
						        <th>Full Name</th>
						        <th>Email Address</th>
						        <th>Phone</th>
						        <th>Message</th>
						        <th>Date</th>
						        <th>Action</th>
						      </tr>
						    </thead>
						    <?php

						    	$schedule = mysqli_query($connect, "SELECT * FROM `feedback`");
						    	while($viewRows = mysqli_fetch_array($schedule)){

						    ?>
						    <tbody>
						      <tr>
						        <td><?php echo $viewRows['fullName']; ?></td>
						        <td><?php echo $viewRows['email']; ?></td>
						        <td><?php echo $viewRows['phone']; ?></td>
						        <td><?php echo $viewRows['message']; ?></td>
						        <td><?php echo $viewRows['date']; ?></td>
						        <td><a href="view_message.php?email=<?php echo $viewRows['email']; ?>" class="text-success">view</a> | <a href="delete_feedback.php?email=<?php echo $viewRows['email']; ?>" class="text-danger">Delete</a></td>
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