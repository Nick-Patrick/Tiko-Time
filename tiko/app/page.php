<?php
	require("header.php");

	if (!isset($_SESSION["user_id"])) {
		$location = "Location: ../index.php";
		header($location);
	}

	require("side_menu.php");
	require("includes/pages/" . $_GET["p"] . ".php");
	require("footer.php");
?>