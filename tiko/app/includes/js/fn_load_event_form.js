	$("#event_type").change(function () {
        var event_temp_id = $(this).val();
    	var value = $.ajax({
        type: "POST",
        url: "includes/scripts/fn_event_form.php",
        data: "event_temp_id="+event_temp_id,
        async: false
    	}).responseText;
    	$("#event_form").html(value);
	});