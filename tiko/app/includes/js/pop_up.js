/*POP UP FUNCTION*/
	var popped = false;

	function popup (href, m, y) {
		if (popped == false) {
			var date = href+"/"+m+"/"+y;
			var html = "<section class='mask' onClick='closepop()'></section><section class='pop'><section class='pop-top'><button onClick='closepop()'>close</button></section><form><ul><li><label for='date'>Date:</label><input type='text' value='"+date+"' name='date'></li><li><label for='date'><input type='text' value='"+date+"' name='date'></li><li><label for='date'><input type='text' value='"+date+"' name='date'></li><li><label for='date'><input type='text' value='"+date+"' name='date'></li></ul></form></section>";
			$('header').before(html);
			$(".pop").hide(0, function() {
				$(this).delay(200).slideDown(400);
			})
			$(".mask").hide(0, function() {
				$(this).fadeIn(400);
			});
			popped = true;
		}
	};

	function closepop() {
		popped = false;
		$(".mask").delay(200).fadeOut( 500, function() {
			$(this).remove();
		});
		$(".pop").slideUp(500, function () {
			$(this).remove();
		});
	}