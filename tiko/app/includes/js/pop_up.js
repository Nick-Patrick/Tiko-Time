/*POP UP FUNCTION*/
	var popped = false;

	$(".calendar-day").click(function () {
		if (popped == true) {
			popped = false;
			$(".calendar-choice").slideUp(500, function() {
				$(this).remove();
			});
		} else {		
			var info = $(this).attr('rel');
			var array = info.split(',');
			var mon = parseInt(array[0]);
			var year = parseInt(array[1]);
			var day = $(this).text();

			var html = "<tr class='calendar-choice'><td colspan='7'>";
			html += "<section class='planned-tasks'><ul>";
			html += "<li><a href=''>Event 1</a></li>";
			html += "<li><a href=''>Event 2</a></li>";
			html += "<li><a href=''>Event 3</a></li>";
			html += "</ul></section>";
			html += "<h3>"+day+"/"+mon+"/"+year+"</h3>";
			html +=	"</td></tr>";
			$(this).closest('tr').after(html);

			$(".calendar-choice td").hide();
			$(".calendar-choice td").slideToggle(500);
			popped = true;
		}

	});