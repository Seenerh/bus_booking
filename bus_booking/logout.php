<?php
	
	session_start();
	ob_start();

	require 'config/conn.php';

	if(isset($_SESSION['email'])){

		session_destroy();
		session_unset();

		header("location: login.php?logout=$logout");
	}



?>