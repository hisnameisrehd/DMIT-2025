<?php
	include("/home/npeters5/data/data.php");
	session_start();
	if (isset($_SESSION['PHP_Test_Secure'])) {
		// echo "Logged In.";
		session_destroy();
		header("Location:login.php");
	}
	include("../includes/header.php");
?>