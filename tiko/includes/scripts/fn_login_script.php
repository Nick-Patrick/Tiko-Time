<?php
	require("../../app/includes/scripts/classes.php");

	$email = mysql_real_escape_string($_POST["email"]);
	$password = mysql_real_escape_string($_POST["password"]);

	$user = new users('', $email, '', $password, '', '', '', '', '', '', '', '', '', '', '');

	$outcome = $user->log_in();

	if ($outcome) {
		$_SESSION["session_ID"] = md5("hashme");
		$location = "Location: ../../app/index.php";
	} else {
		$location = "Location: ../../index.php?log_in=failed";
	}
	header($location);
?>