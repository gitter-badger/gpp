// Variables
var scrolled;
var header;
var window_height;
var top_offset;
var mobile;

// Functions
function scrollActions(){
	scrolled = $(window).scrollTop();
	scrolled > window_height-100 ? header.addClass('white') :  header.removeClass('white');
	if(!mobile)
		$('#home').css("background-position", "center "+(0-(scrolled*.15))+'px');
}

function toggleMenu(){
	$('#relative_content').toggleClass('mobile_menu_open');
	$('#mobile_menu').toggleClass('mobile_menu_open');
	$('#hamburger').toggleClass('as_close');
}

function listenWidth( e ) {
  window_height = $(window).height();
  window_width = $(window).width();
	topOffset();
	mobile = $(window).width() < 1024;
}

function topOffset(){
	if(header.is(":visible"))
		top_offset = 60;
	else
		top_offset = -5;
}

// Bindings
$(function() {
		header = $('#header');
		listenWidth();

		$(window).bind('scroll',function(e){ 
			scrollActions();
		});

		$(document).load($(window).bind("resize", listenWidth));

		$('.calendar-event-highlights').click(function(event) {
			$(this).parent().toggleClass('active').find('.calendar-event-dt').slideToggle({duration:500, easing:'easeOutCubic'});
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
		        scrollTop: $("#"+$.attr(this, 'rel')).offset().top - top_offset
		    }, 1000, 'easeOutCubic');
		    return false;
		});

		$('.mobile_menu-item').click(function(){
			toggleMenu();
		});


});