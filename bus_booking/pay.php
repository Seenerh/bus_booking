<?php 
require 'config/conn.php';

$booking_reference = 0;

if(isset($_GET['reference'])){

	$payment_reference = $_GET['reference'];

	$booking_reference = $payment_reference;

	$payment = mysqli_query($connect,"UPDATE `user_booking` SET 
	      `payment_status` = '1', 
	      `payment_reference` = '$payment_reference' WHERE booking_id = '$booking_reference' ");
		if($payment){
			header("location: view_booking.php");
		}else {
			echo "Fail";
		}
	
}

//updade user payment details here


$booking_id = 0;

if(isset($_GET['bookindId'])){

	$booking_id = $_GET['bookindId'];

	//echo $booking_id; die();


    $user = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE id = 	$booking_id");
	
	$result = mysqli_fetch_array($user);

	$fname = $result['fname'];
	$lname = $result['lname'];
	$full_name = $fname . ' ' . $lname;

	$email = $result['email'];

	$amount = $result['amount'];

	$user_id = $result['booking_id'];

	//echo $full_name; die('It works');

	
	
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-5">
  <div class="card">
  <div class="card-header">
    Payment Process
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <form id="paymentForm">
  <div class="form-group">
   <b> cash payment is on the deperture day <label for="email"></label> </b>
 <input type="hidden" value="<?php echo $email; ?>" id="email-address" required />
 <input type="hidden" value="<?php echo $user_id; ?>" id="user_id" required />
  </div>
  <div class="form-group">
    <!-- <label for="amount">Amount</label> -->
    <input type="hidden" value="<?php echo $amount; ?>"  id="amount" required />
  </div>
  <div class="form-group">
  <b>Pay through bank and come alonge with the reciept<label for="first-name"> <label></b>
    <input type="hidden" value="<?php echo $fname; ?>" id="first-name" >
  </div>
  <div class="form-group">
  <b> Bank Name:First Bank<label for="last-name"></label></b>
    <label for="last-name"></label> 
   <label for="last-name"></label> 
    <input type="hidden" value="<?php echo $lname; ?>" id="last-name" />
  </div>
  <div class="form-group">
 <b> Account Name:Gombe line<label for="first-name"><label></b>
    <input type="hidden" value="<?php echo $fname; ?>" id="first-name" >
  </div>
  <div class="form-group">
 <b> Account Number: 3089037718<label for="first-name"><label></b>
    <input type="hidden" value="<?php echo $fname; ?>" id="first-name" >
  </div>
  <div class="form-submit">
    <h4>Are you sure you want to pay? if yes click the pay button for online payment <button class="btn btn-primary" type="submit" onclick="payWithPaystack()"> Pay </button></h4>
  </div>
</form>
  </div>
</div>
  </div>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script type="text/javascript">
  const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_a38a7fc99fc39263435671ac64a1e64c1d88c221', // Replace with your public key
    email: "ahmadsinanmuhammad@gmail.com";
    amount: document.getElementById("amount").value * 100,
    ref:  document.getElementById("user_id").value, // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);

     // alert(response.status)

       window.location = "http://localhost/bus_booking/pay.php?reference=" + response.reference;
    }

  });
  handler.openIframe();
}
</script>

</body>
</html>