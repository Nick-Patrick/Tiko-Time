	//INSERT EVENT
	$("#create_event_button").click(function() {
		var name = $("#new_event_name").val();
		var desc = $("#new_event_desc").val();
		var date = $("#day_date").text();
		var end_date = $("#end_date_id").val();
		var time_start = date + " " + $("#new_event_time_start_hours").val() + ":" + $("#new_event_time_start_mins").val() + ":00";
		var time_end = end_date + " " + $("#new_event_time_end_hours").val() + ":" + $("#new_event_time_end_mins").val() + ":00";
		var type = $("#new_event_type").val();
		var location = $("#new_event_location").val();
		if ($("#new_event_custom_1").length != 0) {
			var custom_1 = $("#new_event_custom_1");
		} else {
			var custom_1 = null;
		}
		if ($("#new_event_custom_2").length != 0) {
			var custom_2 = $("#new_event_custom_2");
		} else {
			var custom_2 = null;
		}
		if ($("#new_event_custom_3").length != 0) {
			var custom_3 = $("#new_event_custom_3");
		} else {
			var custom_3 = null;
		}
		if ($("#new_event_custom_4").length != 0) {
			var custom_4 = $("#new_event_custom_4");
		} else {
			var custom_4 = null;
		}
		if ($("#new_event_custom_5").length != 0) {
			var custom_5 = $("#new_event_custom_5");
		} else {
			var custom_5 = null;
		}
		console.log(time_start);
		var value = $.ajax({
	    	type: "POST",
	    	url: "includes/scripts/fn_insert_event.php",
	    	data: "name="+name+"&desc="+desc+"&time_start="+time_start+"&time_end="+time_end+"&type="+type+"&location="+location+"&custom_1="+custom_1+"&custom_2="+custom_2+"&custom_3="+custom_3+"&custom_4="+custom_4+"&custom_5="+custom_5,
	   		async: false
		}).responseText;
		$("#event_form").html(value);
	})

	$(".event_end_calendar").click(function (e) {
		e.preventDefault();
		var date = $("#day_date").text();
		$(this).after("<input type='text' id='end_date_id' name='end_date'>");
		$("#end_date_id").val(date);
		$(this).hide();
	});






