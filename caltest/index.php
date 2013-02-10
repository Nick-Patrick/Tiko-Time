<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['yearstoadd'] = 0;
?>
<html>
<head>
	<script src="jquery-1.8.2.min.js" type="text/javascript"></script>
</head>
<body>
	<form action="index.php" method="POST">
		<select name="month">
			<option value="01">Jan</option>
			<option value="02">Feb</option>
			<option value="03">Mar</option>
			<option value="04">Apr</option>
			<option value="05">May</option>
			<option value="06">Jun</option>
			<option value="07">Jul</option>
			<option value="08">Aug</option>
			<option value="09">sep</option>
			<option value="10">Oct</option>
			<option value="11">Nov</option>
			<option value="12">Dec</option>
		</select>
		<select name="year">
			<option value="2012">2012</option>
			<option value="2013" selected="selected">2013</option>
			<option value="2014">2014</option>
			<option value="2015">2015</option>
			<option value="2016">2016</option>
		</select>
		<input type="submit" name="update" value="Update">
	</form>


<section><button id="p">Prev</button><button id="n">Next</button></section>
<section id="test"></section>
<?php
	include_once "classes.php";

	$cal = new calendar()

?>
<script>
$(document).ready(function () {
	var m = month;
	var y = year;

    var valueo = $.ajax({
    	type: "POST",
        url: "changemonth.php",
        data: "m="+m+"&y="+y ,
        async: false
    }).responseText;
    $("#test").html(valueo);

	$("#n").click(function() {
		m++;
		if (m > 12) {
			m = 01;
			y++;
		}
		console.log(m);
		console.log(y);
    	var value = $.ajax({
        type: "POST",
        url: "changemonth.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#test").html(value);
	});
	$("#p").click(function() {
		m--;
		if (m < 1) {
			m = 12;
			y--;
		}
		console.log(m);
		console.log(y);
    	var value = $.ajax({
        type: "POST",
        url: "changemonth.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#test").html(value);
	});
});
</script>
</body>
</html>