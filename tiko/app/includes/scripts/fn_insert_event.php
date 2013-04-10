<?php
	include_once "classes.php";

	$name = mysql_real_escape_string($_POST['name']);
	$desc = mysql_real_escape_string($_POST['desc']);
	$date_start = mysql_real_escape_string($_POST['time_start']);
	$date_end = mysql_real_escape_string($_POST['time_end']);
	$type = mysql_real_escape_string($_POST['type']);
	$location = mysql_real_escape_string($_POST['location']);
	$custom_1 = mysql_real_escape_string($_POST['custom_1']);
	$custom_2 = mysql_real_escape_string($_POST['custom_2']);
	$custom_3 = mysql_real_escape_string($_POST['custom_3']);
	$custom_4 = mysql_real_escape_string($_POST['custom_4']);
	$custom_5 = mysql_real_escape_string($_POST['custom_5']);


	$date_start = date('Y-m-d H:i:s', strtotime($date_start));
	//$date_start_format = new DateTime($date_start);
	//$date_start = $date_start_format->format('Y-m-d H:i:s');
	$date_end = date('Y-m-d H:i:s', strtotime($date_end));
	//$date_end_format = new DateTime($date_end);
	//$date_end = $date_end_format->format('Y-m-d H:i:s');

	//$date_start = explode(" ",$time_start);
	//$date_start = $date_start[0];
	//$date_end = explode(" ",$time_end);
	//$date_end = $date_end[0];


	$event = new event('', $name, $desc, $date_start, $date_end, $type, 'Y', $location, $custom_1, $custom_2, $custom_3, $custom_4, $custom_5);
	$result = $event->create();

	if ($result == true) {
		echo "Event created";
	} else {
		echo "Event creation failure";
	}

?>