<?php 
	error_reporting(0);
	$connect = mysqli_connect("localhost", "root", "", "bus_booking");
	if(!$connect){
		die ("Server Connection Fail");
	}

	$connect_db = mysqli_select_db($connect,"bus_booking");
	if(!$connect_db){
		die ("Database Connection Fail");
	}

?>