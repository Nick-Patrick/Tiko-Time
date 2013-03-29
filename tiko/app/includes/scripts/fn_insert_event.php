<?php
	include_once "classes.php";

	$name = mysql_real_escape_string($_POST['name']);
	$desc = mysql_real_escape_string($_POST['desc']);
	$time_start = mysql_real_escape_string($_POST['time_start']);
	$time_end = mysql_real_escape_string($_POST['time_end']);
	$type = mysql_real_escape_string($_POST['type']);
	$location = mysql_real_escape_string($_POST['location']);
	$custom_1 = mysql_real_escape_string($_POST['custom_1']);
	$custom_2 = mysql_real_escape_string($_POST['custom_2']);
	$custom_3 = mysql_real_escape_string($_POST['custom_3']);
	$custom_4 = mysql_real_escape_string($_POST['custom_4']);
	$custom_5 = mysql_real_escape_string($_POST['custom_5']);


	$date_start = explode(" ",$time_start);
	$date_start = $date_start[0];
	$date_end = explode(" ",$time_end);
	$date_end = $date_end[0];



	function getDatesBetween2Dates($startTime, $endTime) {
    	$day = 86400;
    	$format = 'Y-m-d';
    	$startTime = strtotime($startTime);
   		$endTime = strtotime($endTime);
    	$numDays = round(($endTime - $startTime) / $day) + 1;
    	$days = array();
        
    	for ($i = 0; $i < $numDays; $i++) {
        	$days[] = date($format, ($startTime + ($i * $day)));
    	}
       return $days;
	}
        


	$event = new event('', $name, $desc, $time_start, $time_end, $type, 'Y', $location, $custom_1, $custom_2, $custom_3, $custom_4, $custom_5);
	$result = $event->create();

	if ($date_start != $date_end) {
		$days = getDatesBetween2Dates($date_start, $date_end);
		foreach($days as $key => $value){
    		$event->insertBetweenDates($value);
		}
	}

	if ($result == true) {
		echo "Event created";
	} else {
		echo "Event creation failure";
	}

?>