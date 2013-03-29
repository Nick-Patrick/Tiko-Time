<?php
	include_once "classes.php";

	$cal = new Calendar();
		$event_template_id = $_POST['event_temp_id'];
		echo $cal->GetEventForm($event_template_id);


?>