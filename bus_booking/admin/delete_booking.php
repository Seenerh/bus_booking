<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';



	if(isset($_GET['BookingID'])){

						  			$book_id = $_GET['BookingID'];
						  			

						  			$load = mysqli_query($connect, "DELETE FROM `user_booking` WHERE booking_id='$book_id'");
						  			if($load){
						  				header("location: view_booking.php?success=$delete");
						  			}else{
						  				echo "Wrong";
						  			}

						  			
						  		}


?>