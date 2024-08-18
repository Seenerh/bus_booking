<?php 

	
	session_start();
	ob_start();

	if(! isset($_SESSION['email'])){
		header("location:index.php");
	}

	require '../config/conn.php';



	if(isset($_GET['BusNo'])){

						  			$bus_id = $_GET['BusNo'];
						  			

						  			$load = mysqli_query($connect, "DELETE FROM `bus_schedules` WHERE bus_no='$bus_id'");
						  			if($load){
						  				header("location: bus_schedule.php?success=$delete");
						  			}else{
						  				echo "Wrong";
						  			}

						  			
						  		}


?>