// Variables
var scrolled;
var header;
var window_height;
var top_offset;
var mobile;
var gpp_slider_last_page;
var mvc_slider_last_page;

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
  mobile = window_width < 1024;
  // Calculation for sliders
  sliderRepaint($('#gpp-slider'),'gpp');
  sliderRepaint($('#mcv-slider'),'mcv');
}

function sliderRepaint(slider, type){
  old_slider_last_page = (type=='gpp') ? gpp_slider_last_page : mvc_slider_last_page;
  elements_per_page = 4;
  elements_per_page -= (window_width<950) ? 2 : 0;
  elements_per_page -= (window_width<550) ? 1 : 0;
  elements_volume = slider.find('.testimonials-item').length;
  slider_last_page = Math.ceil(elements_volume/elements_per_page);
  if(old_slider_last_page!=slider_last_page){
    slider.css('left','0%');
    slider.data("active", 1);
    slider.next().find('.testimonials-buttons-item--prev').addClass('disabled');
    slider.next().find('.testimonials-buttons-item--next').removeClass('disabled');
  }
  (type=='gpp') ? gpp_slider_last_page = slider_last_page : mvc_slider_last_page = slider_last_page;
}

function topOffset(){
  if(header.is(":visible"))
    top_offset = 60;
  else
    top_offset = -5;
}

function scrollTo(element_id){
  $('html, body').stop(true,true).animate({
      scrollTop: $(element_id).offset().top - top_offset
  }, 1000, 'easeOutCubic');
}

function moveSlider(slider, direction){
  value = (direction=="next") ? -100 : 100;
  page = (direction=="next") ? 1 : -1;
  slider.css('left', function(){
    return (parseInt(slider[0].style.left)+value)+"%"
  });
  slider.data("active", parseInt(slider.data("active"))+page);
  if(slider.data("active")==1)
    slider.next().find('.testimonials-buttons-item--prev').addClass('disabled');
  else
    slider.next().find('.testimonials-buttons-item--prev').removeClass('disabled');
  
  if(slider.data("active")==((slider.attr('id')=='gpp-slider') ? gpp_slider_last_page : mvc_slider_last_page))
    slider.next().find('.testimonials-buttons-item--next').addClass('disabled');
  else
    slider.next().find('.testimonials-buttons-item--next').removeClass('disabled');
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
      $(this).parent().toggleClass('active').find('.calendar-event-dt').stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    $('.faq-item').click(function(event) {
      $(this).toggleClass('active').find('.faq-item-anwser').stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    $('#fake-select').click(function(event) {
      $(this).next().stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    $('#fake-select-options .subscribe-form-fake_select-options-option').click(function(event) {
      $(this).parent().stop(true,true).slideUp({duration:200, easing:'easeOutCubic'});
      $("#select-input").val($(this).data("value"));
      $('#select-value').html($(this).html());
    });

    $('#hamburger, #close').click(function(event) {
      toggleMenu();
    });

    $('.header-top_nav-item, .mobile_menu-item').click(function(){
        scrollTo("#"+$.attr(this, 'rel'));
        return false;
    });

    $('.contact-action').click(function(event) {
      scrollTo("#contact");
      if($(this).data('action')){
        $("#select-input").val($(this).data("action"));
        $('#select-value').html($('.subscribe-form-fake_select-options-option[data-value="'+$(this).data("action")+'"]').html());
      }
    });

    $('.mobile_menu-item').click(function(){
      toggleMenu();
    });

    $('.for-guest').click(function(event) {
      var options = {
        useEasing : true, 
        useGrouping : true
      }
      $('.price-tag-value').each(function(index, el) {
        countElement = $(this);
        var demo = new countUp(countElement[0], countElement.data('price'), countElement.data('promo-price'), 0, 1.5);
        demo.start();
        $(".price-promotion").html("Special price for the members of The Supper Club.").removeClass('for-guest');
      });
    });

    $('.testimonials-buttons-item--next').click(function(event) {
      slider = $(this).parent().prev();
      if(parseInt(slider.data("active")) >= ((slider.attr('id')=='gpp-slider') ? gpp_slider_last_page : mvc_slider_last_page)){
        return false;
      }
      moveSlider(slider,"next");
    });
    $('.testimonials-buttons-item--prev').click(function(event) {
      slider = $(this).parent().prev();
      if(parseInt(slider.data("active")) <= 1){
        return false;
      }
      moveSlider(slider,"prev");
    });


});