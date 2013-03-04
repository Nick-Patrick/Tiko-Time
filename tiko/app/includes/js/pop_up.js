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

			var html = "<tr class='calendar-choice'><td colspan='7'>";
			html += "<section class='planned-tasks'><h4>Current Tasks</h4><ul>";
			html += "<li><a href=''><span class='calendar-event-time'>10:30</span><span class='calendar-event-icon'><img src='includes/images/icons/plane-icon.png'></span>Event 1</a></li>";
			html += "<li><a href=''><span class='calendar-event-time'>11:30</span><span class='calendar-event-icon'><img src='includes/images/icons/meeting-icon.png'></span>Event 2</a></li>";
			html += "<li><a href=''><span class='calendar-event-time'>14:00</span><span class='calendar-event-icon'><img src='includes/images/icons/plane-icon.png'></span>Event 3</a></li>";
			html += "</ul></section>";
			html += "<h3>"+day+"/"+mon+"/"+year+"</h3>";
			html +=	"</td></tr>";
			$(this).closest('tr').after(html);

			popped = true;

			$(".calendar-choice td").hide(0, function() {
				$(this).slideToggle(500);
			});
			//$(".calendar-choice td").slideToggle(500);
		}

	});