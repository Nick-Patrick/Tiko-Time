<?php 
	session_start();

	if (isset($_SESSION["session_ID"])) {

	} else {
		$location = "Location: ../index.php";
		header($location);
	}
	require('includes/scripts/classes.php');
	require('html_header.php');
?>