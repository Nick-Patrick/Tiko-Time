/*POP UP FUNCTION*/
	var popped = false;

	$(".calendar-day").click(function () {
		if (popped == true) {
			popped = false;
			$(".calendar-choice").slideToggle(500, function() {
				$(this).remove();
			});
		} else {		
			var info = $(this).attr('rel');
			var array = info.split(',');
			var mon = parseInt(array[0]);
			var year = parseInt(array[1]);
			var day = $(this).text();
			//var user_id = 
			var user_id = '123';
			var date = year+"/"+mon+"/"+day;

			var html = "<tr class='calendar-choice'><td colspan='7'>";
			html += "<section class='planned-tasks'></section>";
			html += "<h3 id='day_date'>"+year+"/"+mon+"/"+day+"</h3>";
			html += "<section id='event_type_selection'></section><section id='event_form'></section>";
			html +=	"</td></tr>";
			$(this).closest('tr').after(html);

			popped = true;

			$(".calendar-choice td").hide(0, function() {
				$(this).slideToggle(500);
			});
			//$(".calendar-choice td").slideToggle(500);

	    	var value = $.ajax({
	        	type: "POST",
	        	url: "includes/scripts/fn_event_retrieval.php",
	        	data: "id="+user_id+"&form=y",
	        	async: false
	    	}).responseText;
	    	$("#event_type_selection").html(value);

	    	var events = $.ajax({
	        	type: "POST",
	        	url: "includes/scripts/fn_event_retrieval.php",
	        	data: "date="+date+"&dateEvent=y",
	        	async: false
	    	}).responseText;
	    	$(".planned-tasks").html(events);
		}

	});