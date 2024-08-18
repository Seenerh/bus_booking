	 <?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:login.php");
	}

	require 'config/conn.php';

	$error = false;
	$errorMsg = "";


	$loadBook = mysqli_query($connect,"SELECT * FROM `user_booking` WHERE email='".$_SESSION['email']."'");
	$bookRow = mysqli_fetch_array($loadBook);





	if(isset($_POST['payment'])){


		$fname = mysqli_real_escape_string($connect,$_POST['fname']);
		$lname = mysqli_real_escape_string($connect,$_POST['lname']);
		$cname = mysqli_real_escape_string($connect,$_POST['cname']);
		$cnumber = mysqli_real_escape_string($connect,$_POST['cnumber']);
		$ccv = mysqli_real_escape_string($connect,$_POST['ccv']);
		$cexpired = mysqli_real_escape_string($connect,$_POST['cexpired']);
		$cpin = mysqli_real_escape_string($connect,$_POST['cpin']);
		$route = mysqli_real_escape_string($connect,$_POST['route']);
		$amount = mysqli_real_escape_string($connect,$_POST['amount']);
		$ctype = mysqli_real_escape_string($connect,$_POST['ctype']);
		$bname = mysqli_real_escape_string($connect,$_POST['bname']);


		if(!preg_match("/^[0-9]*$/", $cnumber)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Card Number </div>";
		}else

		if(strlen($cnumber)<19){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Card Number Limit </div>";
		}else 

		if(!preg_match("/^[0-9]*$/", $ccv)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Card CCV </div>";
		}else

		if(strlen($ccv)<3){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid CCV Number Limit </div>";
		}else 

		if(!preg_match("/^[0-9]*$/", $cpin)){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Card Pin Number </div>";
		}else

		if(strlen($cpin)<4){
			$error = true;
			$errorMsg = "<div class='alert alert-danger'> Invalid Card Pin Limit </div>";
		}else {


		$payment = mysqli_query($connect, "INSERT INTO `payment_booking` (fname, lname, email, cname, cnumber, ccv, booking_id, bus_no, route, amount, ctype, bname, payment_date, payment_id, status) VALUES ('$fname', '$lname', '".$_SESSION['email']."', '$cname', '$cnumber', '$ccv', '".$bookRow['booking_id']."', '".$bookRow['bus_no']."', '$route', '$amount', '$ctype', '$bname', '".date('d-m-Y')."', '".md5(5)."', '1')");
		if($payment){
			header("location: payment_slip.php");
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

	<?php require 'config/header.php'; ?>

	<div class="container" style="margin-top: 110px">
		<div class="row">

			<?php require 'config/sidebar.php'; ?>

			<div class="col-md-6 col-md-offset-1">
				<div class="panel panel-default">
				  <div class="panel-body" style="padding: 40px">

				  	<form method="POST" action="">

				  		<!-- Modal -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						         <h4 class="modal-title">Payment Comfirmation</h4>
						      </div>
						      <div class="modal-body">
						        <p class="text-danger text-center">Are you sure want to make payment Bus ticket <b>Note: no return of money after payment.</b></p>
						      </div>
						      <div class="modal-footer">
						      	<button type="submit" class="btn btn-default" name="payment" id="payment">Yes Payment</button>
						        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
						      </div>
						    </div>

						  </div>
						</div>


				  		<div class="form-group">
				  			<h4 class="text-center"><b>Payment Booking</b></h4> <hr>
				  		</div>

				  		<div class="form-group">
				  			<?php if(isset($error)){ echo $errorMsg; } ?>
				  		</div>

				  		<div class="row">
				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>First Name:</label>
						  			<input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $viewUser['fname']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Last Name:</label>
						  			<input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" value="<?php echo $viewUser['lname']; ?>" readonly required>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Credit Card Type:</label>
						  			<select name="ctype" id="ctype" class="form-control"required >
						  				<option hidden> Card Type</option>
						  				<option value="<?php if(isset($_POST['ctype'])){ echo $ctype; } ?>"><?php if(isset($_POST['ctype'])){ echo $ctype; } ?></option>
						  				<option value="master card">Master Card</option>
						  				<option value="verve Card">Verve Card</option>
						  				<option value="visa card">Visa Card</option>
						  				<option value="interswich card">Interswich Card</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-6">
				  				<div class="form-group">
						  			<label>Bank Name:</label>
						  			<select type="text" name="bname" id="bname" class="form-control" placeholder="Card Name" required value="<?php if(isset($_POST['bname'])){ echo $bname; } ?>">
						  				<option hidden>Bank Name</option>
						  				<option value="<?php if(isset($_POST['ctype'])){ echo $ctype; } ?>"><?php if(isset($_POST['ctype'])){ echo $ctype; } ?></option>
						  				<option value="UBA Bank">UBA Bank</option>
						  				<option value="Jaiz Bank">Jaiz Bank</option>
						  				<option value="GT Bank">GT Bank</option>
						  				<option value="First Bank">First Bank</option>
						  				<option value="Diamond Bank">Diamond Bank</option>
						  				<option value="Sky Bank">Sky Bank</option>
						  				<option value="FCMB Bank">FCMB Bank</option>
						  			</select>
						  		</div>
				  			</div>

				  			<div class="col-md-12">
				  				<div class="form-group">
						  			<label>Card Name:</label>
						  			<input type="text" name="cname" id="cname" class="form-control" placeholder="Card Name" required value="<?php if(isset($_POST['cname'])){ echo $cname; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-8">
				  				<div class="form-group">
						  			<label>Card Number</label>
						  			<input type="text" name="cnumber" id="cnumber" class="form-control" placeholder="Card Number" required value="<?php if(isset($_POST['cnumber'])){ echo $cnumber; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>CCV</label>
						  			<input type="text" name="ccv" id="ccv" class="form-control" placeholder="CCV" required value="<?php if(isset($_POST['ccv'])){ echo $ccv; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-7">
				  				<div class="form-group">
						  			<label>Card Expired</label>
						  			<input type="date" name="cexpired" id="cexpired" class="form-control" placeholder="Card Expired" required value="<?php if(isset($_POST['cexpired'])){ echo $cexpired; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-5">
				  				<div class="form-group">
						  			<label>Card Pin</label>
						  			<input type="text" name="cpin" id="cpin" class="form-control" placeholder="Pin No" required value="<?php if(isset($_POST['cpin'])){ echo $cpin; } ?>">
						  		</div>
				  			</div>

				  			<div class="col-md-8">
				  				<div class="form-group">
						  			<label>Route</label>
						  			<input type="text" name="route" id="route" class="form-control" placeholder="Expire Date" value="<?php echo $bookRow['route']; ?>" readonly required>
						  		</div>
				  			</div>


				  			<div class="col-md-4">
				  				<div class="form-group">
						  			<label>Amount</label>
						  			<input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" value="<?php echo $bookRow['amount']; ?>" readonly required>
						  		</div>
				  			</div>


				  		</div>

				  		<div class="form-group">
				  			<button type="submit" class="btn btn-default btn-sm pull-right" name="payment" id="payment">Booking Payment</button>

				  		</div>
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