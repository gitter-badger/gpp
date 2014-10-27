// Variables
var scrolled;
var header;
var window_height;

// Functions
function scrollActions(){
	scrolled = $(window).scrollTop();
	scrolled > window_height-60 ? header.addClass('white') :  header.removeClass('white');
}

// Bindings
$(function() {
		header = $('#header');
		window_height = $(window).height();

		$(window).bind('scroll',function(e){ 
			scrollActions();
		});

		$('.calendar-event-highlights').click(function(event) {
			$(this).parent().toggleClass('active').find('.calendar-event-dt').slideToggle();
		});

		$('.faq-item').click(function(event) {
			$(this).toggleClass('active').find('.faq-item-anwser').slideToggle();
		});

		$('.header-top_nav-item').click(function(){
		    $('html, body').animate({
		        scrollTop: $("#"+$.attr(this, 'rel')).offset().top - 50
		    }, 500);
		    return false;
		});
});
$.attr(this, 'rel')


