<?php
	include_once "classes.php";
	$cal = new Calendar();

	if ($_POST['form'] == "y") {
		$user_id = $_POST['id'];
		echo $cal->getCustomEvents($user_id);
	}
	
	if ($_POST['dateEvent'] == "y") {
		$date = $_POST['date'];
		echo $cal->getEventsByDay($date);
	}
?>