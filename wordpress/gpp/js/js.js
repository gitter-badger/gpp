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
  scrolled = jQuery(window).scrollTop();
  scrolled > window_height-100 ? header.addClass('white') :  header.removeClass('white');
  if(!mobile)
    jQuery('#home').css("background-position", "center "+(0-(scrolled*.15))+'px');
}

function toggleMenu(){
  jQuery('#relative_content').toggleClass('mobile_menu_open');
  jQuery('#mobile_menu').toggleClass('mobile_menu_open');
  jQuery('#hamburger').toggleClass('as_close');
}

function listenWidth( e ) {
  window_height = jQuery(window).height();
  window_width = jQuery(window).width();
  topOffset();
  mobile = window_width < 1024;
  // Calculation for sliders
  sliderRepaint(jQuery('#gpp-slider'),'gpp');
  sliderRepaint(jQuery('#mcv-slider'),'mcv');
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
  jQuery('html, body').stop(true,true).animate({
      scrollTop: jQuery(element_id).offset().top - top_offset
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
jQuery(function() {
    header = jQuery('#header');
    listenWidth();

    jQuery(window).bind('scroll',function(e){ 
      scrollActions();
    });

    jQuery(document).load(jQuery(window).bind("resize", listenWidth));

    jQuery('.calendar-event-highlights').click(function(event) {
      jQuery(this).parent().toggleClass('active').find('.calendar-event-dt').stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    jQuery('.faq-item').click(function(event) {
      jQuery(this).toggleClass('active').find('.faq-item-anwser').stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    jQuery('#fake-select').click(function(event) {
      jQuery(this).next().stop(true,true).slideToggle({duration:500, easing:'easeOutCubic'});
    });

    jQuery('#fake-select-options .subscribe-form-fake_select-options-option').click(function(event) {
      jQuery(this).parent().stop(true,true).slideUp({duration:200, easing:'easeOutCubic'});
      jQuery("#select-input").val(jQuery(this).data("value"));
      jQuery('#select-value').html(jQuery(this).html());
    });

    jQuery('#hamburger, #close').click(function(event) {
      toggleMenu();
    });

    jQuery('.menu-item a').click(function(){
        scrollTo(jQuery(this).attr('href'));
        return false;
    });

    jQuery('.contact-action').click(function(event) {
      scrollTo("#contact");
      if(jQuery(this).data('action')){
        jQuery("#select-input").val(jQuery(this).data("action"));
        jQuery('#select-value').html(jQuery('.subscribe-form-fake_select-options-option[data-value="'+jQuery(this).data("action")+'"]').html());
      }
    });

    jQuery('.mobile_menu-item').click(function(){
      toggleMenu();
    });

    jQuery('.for-guest').click(function(event) {
      var options = {
        useEasing : true, 
        useGrouping : true
      }
      jQuery('.price-tag-value').each(function(index, el) {
        countElement = jQuery(this);
        var demo = new countUp(countElement[0], countElement.data('price'), countElement.data('promo-price'), 0, 1.5);
        demo.start();
        jQuery(".price-promotion").html("Special price for the members of The Supper Club.").removeClass('for-guest');
      });
    });

    jQuery('.testimonials-buttons-item--next').click(function(event) {
      slider = jQuery(this).parent().prev();
      if(parseInt(slider.data("active")) >= ((slider.attr('id')=='gpp-slider') ? gpp_slider_last_page : mvc_slider_last_page)){
        return false;
      }
      moveSlider(slider,"next");
    });
    jQuery('.testimonials-buttons-item--prev').click(function(event) {
      slider = jQuery(this).parent().prev();
      if(parseInt(slider.data("active")) <= 1){
        return false;
      }
      moveSlider(slider,"prev");
    });

    jQuery('.testimonials-item-video').fancybox();

});