<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';


	if(isset($_GET['email'])){

						  			$GetMail = $_GET['email'];
						  			

						  			$load = mysqli_query($connect, "DELETE FROM `feedback` WHERE email='$GetMail'");
						  			if($load){
						  				header("location: view_feedback.php?status=$delete");
						  			}else{
						  				echo "Wrong";
						  			}

						  			
						  		}



?>