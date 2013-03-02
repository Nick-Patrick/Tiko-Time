$(document).ready(function() {
	/*OPTION HEADER JS*/
	var option = false;
	$(".options_link").click(function(e) {
		e.preventDefault();
		$(".options").stop().dequeue().slideToggle(500);
	});

	$(".options_link").mouseover(function() {
		$(this).find('img').animate({  textIndent: 0 }, {
    step: function(now,fx) {
      $(this).css('-webkit-transform','rotate('+now+'deg)'); 
    },
    duration:'slow'
},'linear');
	});

	/*END OPTION HEADER JS*/


	/*END CALENDER FUNCTION*/
});
