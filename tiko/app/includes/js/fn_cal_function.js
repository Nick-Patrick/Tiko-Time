function loadEvents() {
	var value = $.ajax({
		type: "POST",
		url: "includes/scripts/fn_event_retrieval.php",
		data: "id="+user_id+"&form=y",
		async: false
	}).responseText;
	$("#event_type_selection").html(value);
}