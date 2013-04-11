<?php
	session_start();
	if (isset($_SESSION["user_id"])) {
		include_once "classes.php";
		$cal = new Calendar();

		if ($_POST['form'] == "y") {
			echo $cal->getCustomEvents($_SESSION["user_id"]);
		}
	
		if ($_POST['dateEvent'] == "y") {
			$date = $_POST['date'];
			echo $cal->getEventsByDay($date);
		}
	} else {
		echo "<script>window.location = '../index.php'</script>";
	}

?>