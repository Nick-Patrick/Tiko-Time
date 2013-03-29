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

	/*AJAX LOADING*/
	/*$(".app_wrapper").on({
		var loading = "<section class='loading'>Loading</section>";
    // When ajaxStart is fired, add 'loading' to body class
    ajaxStart: function() { 
        $(this).append(loading); 
    },
    // When ajaxStop is fired, rmeove 'loading' from body class
    ajaxStop: function() { 
        $(this).remove(".loading"); 
    }    
});
	/*END AJAX LOADING*/


	/*END CALENDER FUNCTION*/

	/*AJAX AFTER EVENT CREATED*/
	/*END REFESH AJAX*/
});
