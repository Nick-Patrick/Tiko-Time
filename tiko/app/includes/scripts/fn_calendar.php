<?php
include_once "classes.php";

	$cal = new calendar();

	if (isset($_POST['m'])) {
		$months = $_POST['m'];
		$years = $_POST['y'];

		$cal->setCurYear($years);
		$cal->setCurMon($months);

		$cal->showCalendar();	
	} else {
		$cal->showCalendar();
	}

?>