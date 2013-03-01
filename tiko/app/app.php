<section class="app_wrapper">
<section class="calendar-options">

		<section class="calendar-options-buttons"><button id="p"><</button><button id="n">></button></section>

		<section class="calendar-options-drops">
			<select name="month" id="mn">
				<option value="1">Jan</option>
				<option value="2">Feb</option>
				<option value="3">Mar</option>
				<option value="4">Apr</option>
				<option value="5">May</option>
				<option value="6">Jun</option>
				<option value="7">Jul</option>
				<option value="8">Aug</option>
				<option value="9">sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			</select>
			<select name="year" id="yr">
				<option value="2012">2012</option>
				<option value="2013" selected="selected">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
			</select>
		</section>

	</section>
	<section id="calendar"></section>
<?php
	include_once "includes/scripts/classes.php";

	$cal = new calendar()

?>
<script>
$(document).ready(function() {

	/*CALENDER FUNCTION*/
	var m = month;
	var y = year;

    var valueo = $.ajax({
    	type: "POST",
        url: "includes/scripts/calendar.php",
        data: "m="+m+"&y="+y ,
        async: false
    }).responseText;
    $("#calendar").html(valueo);

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
        url: "includes/scripts/calendar.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#calendar").html(value);
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
        url: "includes/scripts/calendar.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#calendar").html(value);
	});
	$("#yr").change(function () {
		y = $("#yr").val();
		console.log(m);
		console.log(y);
    	var value = $.ajax({
        type: "POST",
        url: "includes/scripts/calendar.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#calendar").html(value);
	});
	$("#mn").change(function () {
		m = $("#mn").val();
		console.log(m);
		console.log(y);
    	var value = $.ajax({
        type: "POST",
        url: "includes/scripts/calendar.php",
        data: "m="+m+"&y="+y ,
        async: false
    	}).responseText;
    	$("#calendar").html(value);
	});
	/*END CALENDER FUNCTION*/

});
</script>
</section>