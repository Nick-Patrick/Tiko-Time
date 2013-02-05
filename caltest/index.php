<html>
<head>
</head>
<body>
	<form action="index.php" method="POST">
		<select name="month"><option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">April</option></select>
		<select name="year"><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option></select>
		<input type="submit" name="update" value="Update">
	</form>

<?php
	include_once "classes.php";

	$cal = new calendar();
	

	if (isset($_POST['update'])) {
		$month = $_POST['month'];
		$year = $_POST['year'];

		$cal->setCurMon($month);
		$cal->setCurYear($year);
		$cal->showCalendar();	
	} else {
			$cal->showCalendar();
	}

	if (isset($_POST['prev'])) {
		$cal->prevMonth();
	}

	if (isset($_POST['next'])) {
		$cal->nextMonth();
	}

?>
</body>
</html>