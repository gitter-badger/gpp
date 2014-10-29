// Variables
var scrolled;
var header;
var window_height;
var calendar_offset;

// Functions
function scrollActions(){
	scrolled = $(window).scrollTop();
	scrolled > window_height-60 ? header.addClass('white') :  header.removeClass('white');
	$('#home').css("background-position", "center "+(0-(scrolled*.15))+'px');
}

function toggleMenu(){
	$('#relative_content').toggleClass('mobile_menu_open');
	$('#mobile_menu').toggleClass('mobile_menu_open');
	$('#hamburger_icon').toggleClass('as_close');
}



// Bindings
$(function() {
		header = $('#header');
		window_height = $(window).height();
		calendar_offset = $("#calendar").offset().top - window_height;

		$(window).bind('scroll',function(e){ 
			scrollActions();
		});

		$('.calendar-event-highlights').click(function(event) {
			$(this).parent().toggleClass('active').find('.calendar-event-dt').slideToggle({duration:1000, easing:'easeOutCubic'});
		});

		$('.faq-item').click(function(event) {
			$(this).toggleClass('active').find('.faq-item-anwser').slideToggle({duration:500, easing:'easeOutCubic'});
		});

		$('#fake-select').click(function(event) {
			$(this).next().slideToggle({duration:500, easing:'easeOutCubic'});
		});

		$('#fake-select-options .subscribe-form-fake_select-options-option').click(function(event) {
			$(this).parent().slideUp({duration:200, easing:'easeOutCubic'});
			$("#select-input").val($(this).data("value"));
			$('#select-value').html($(this).html());
		});

		$('#hamburger, #close').click(function(event) {
			toggleMenu();
		});

		$('.header-top_nav-item, .mobile_menu-item').click(function(){
		    $('html, body').animate({
		        scrollTop: $("#"+$.attr(this, 'rel')).offset().top - 50
		    }, 1000, 'easeOutCubic');
		    return false;
		});

		$('.mobile_menu-item').click(function(){
			toggleMenu();
		});


});
$.attr(this, 'rel')


