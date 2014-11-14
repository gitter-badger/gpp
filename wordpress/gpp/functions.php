<?php
/**
 * gpp functions and definitions
 *
 * @package gpp
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'gpp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gpp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gpp, use a find and replace
	 * to change 'gpp' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gpp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gpp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gpp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // gpp_setup
add_action( 'after_setup_theme', 'gpp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gpp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gpp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'gpp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gpp_scripts() {
	wp_enqueue_style( 'gpp-style', get_template_directory_uri() . '/stylesheets/global.css' );
	wp_enqueue_style( 'gpp-style-ie', get_template_directory_uri() . '/stylesheets/ie.css' );
	// wp_enqueue_style( 'gpp-style-print', get_template_directory_uri() . '/stylesheets/print.css' );
	// wp_enqueue_style( 'gpp-style-screen', get_template_directory_uri() . '/stylesheets/screen.css' );


	wp_enqueue_script('jquery');
	wp_enqueue_script( 'gpp-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js');	
	wp_enqueue_script( 'gpp-countUp', get_template_directory_uri() . '/js/countUp.min.js');
	

	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.css' );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js');

	wp_enqueue_script( 'gpp-js', get_template_directory_uri() . '/js/js.js');
}
add_action( 'wp_enqueue_scripts', 'gpp_scripts' );
add_theme_support( 'post-thumbnails' ); 

// Add Shortcode
function subtitle_shortcode() {

	// Code
    return "<div class='align-center'><div class='subtitle'></div></div>";
}
add_shortcode( 'subtitle', 'subtitle_shortcode' );

// HERO SHORTCODE
function hero_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'heading' => 'GROWTH PARTNERS',
			'description' => 'Designed to help entrepreneurs scale their business<br> and drive capital value',
			'button' => 'SUBSCRIBE TO OUR PROGRAMME',
			'linkedin_url' => 'https://www.linkedin.com/company/prelude-group',
			'twitter_url' => 'https://twitter.com/preludegroup'
		), $atts )
	);

	$cat_id = get_cat_ID('Event MC');
	$args = array ( 'cat' => $cat_id, 'posts_per_page' => 1 , 'order' => 'ASC');
	$mc_query = new WP_Query( $args );

	$cat_id = get_cat_ID('Event GPP');
	$args = array ( 'cat' => $cat_id, 'posts_per_page' => 1, 'order' => 'ASC' );
	$gpp_query = new WP_Query( $args );

	ob_start(); ?> 
	<div class="hero-main_content">
      <div class="hero-main_content-main_title"><?php echo $heading ?></div>
      <div class="vertical-align-middle">
        <div class="thirty-five-box hero-main_content-stripline hero-main_content-content-box">
          <?php echo $description ?>
        </div>
        <div class="inline-block twenty-five-box align-center">
        </div>
        <div class="inline-block thirty-five-box align-right vertical-align-top hero-main_content-content-box">
          <div class="hero-main_content-events">
            <div class="hero-main_content-events-header">
              Upcoming dates
            </div>
            <div class="hero-main_content-events-hr"></div>
            <div class="hero-main_content-events-item">
              <img src="<?php echo get_template_directory_uri()?>/gfx/gpp_mini.png" class="left">
              <div class="right hero-main_content-events-date">
								<?php if ( $gpp_query->have_posts() ): while ( $gpp_query->have_posts() ) :
					        		$gpp_query->the_post();
									the_title();
								endwhile; endif; wp_reset_query(); ?>
              </div>
            </div>
            <div class="cl"></div>
            <div class="hero-main_content-events-hr"></div>
            <div class="hero-main_content-events-item">
              <img src="<?php echo get_template_directory_uri()?>/gfx/mcv_mini.png" class="left">
              <div class="right hero-main_content-events-date">
                <?php if ( $mc_query->have_posts() ): while ( $mc_query->have_posts() ) :
					        		$mc_query->the_post();
									the_title();
								endwhile; endif; wp_reset_query(); ?>
              </div>
            </div>
            <div class="cl"></div>
            <div class="hero-main_content-events-hr"></div>
            <a class="button contact-action"><?php echo $button ?></a>
          </div>
        </div>
      </div>
    </div> 
    
    <div class="cl"></div>
    
    <div class="hero-partners">
      <h4 class="contrast-color">Driven by</h4>
      <a target="_blank" href="http://www.thesupperclub.com/"><img src="<?php echo get_template_directory_uri()?>/gfx/supper_clud.png" /></a>
      <div class="hero-partners-container">
        <a target="_blank" href="http://www.preludegroup.co.uk/"><img src="<?php echo get_template_directory_uri()?>/gfx/prelude.png" /></a>
        <a target="_blank" href="http://www.preludegroup.co.uk/about-us/speaker-boutique/"><img src="<?php echo get_template_directory_uri()?>/gfx/speaker.png" /></a>
      </div>
    </div>

    <div class="hero-social">
      <h4 class="contrast-color"> </h4>
      <a href="#footer" class="hero-social-newsletter" id="newsletter-button"><span class="max_1000">Subscribe to our </span>newsletter</a>
      <div class="hero-social-container">
        <a target="_blank" href="<?php echo $linkedin_url ?>"><img src="<?php echo get_template_directory_uri()?>/gfx/linkedin.png" /></a>
        <a target="_blank" href="<?php echo $twitter_url ?>"><img src="<?php echo get_template_directory_uri()?>/gfx/twitter.png" /></a>
      </div>
    </div>
  </div>
  <?PHP return ob_get_clean();     
}
add_shortcode( 'hero', 'hero_shortcode' );


function section_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
	return "<div class='section ".$class."' id='".$id."'><div class='content'>".do_shortcode($content)."</div><div class='cl'></div></div>";
}
add_shortcode( 'section', 'section_shortcode' );




function one_half_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
	return "<div class='half-box left long_text padding20 section-content-box ".$class."'>".do_shortcode($content)."</div>";
}
add_shortcode( 'one_half', 'one_half_shortcode' );

function one_half_small_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
	return "<div class='half-box left padding10 days ".$class."'>".do_shortcode($content)."</div>";
}
add_shortcode( 'one_half_small', 'one_half_small_shortcode' );

function button_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'action' => '',
			'action_desc' => '',
			'text' => 'GET IN TOUCH'
		), $atts )
	);
	return "<a class='button contact-action' data-action='".$action."' data-action-desc='".$action_desc."'>".$text."</a>";
}
add_shortcode( 'button', 'button_shortcode' );

function price_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'price' => '',
			'price2' => '',
			'text' => 'If ou are a member of The Supper Club click here.',
			'class' => ''
		), $atts )
	);
	ob_start(); ?> 
	<div class="price">
    <div class="price-tag <?php echo $class ?>">
      Price: <strong>£<span class="price-tag-value" data-price="<?php echo $price ?>" data-promo-price="<?php echo $price2 ?>"><?php echo $price ?></span></strong> excl VAT
    </div>
    <div class="price-promotion for-guest">
    	<?php echo $text ?>
    </div>
  </div>
	<div class="cl"></div>
	<?PHP return ob_get_clean();  
}
add_shortcode( 'price', 'price_shortcode' );


function gpp_testimonials_function( $atts ) {
	$cat_id = get_cat_ID('Testimonial GPP');
	$args = array ( 'cat' => $cat_id );
	$gpp_query = new WP_Query( $args );
	ob_start(); ?> 

	<div class="cl"></div>
  	<div class="content testimonials">
    	<div id="gpp-slider" class="testimonials-wrapper" data-active="1" style="left:0%;">

			<?php if ( $gpp_query->have_posts() ): while ( $gpp_query->have_posts() ) :
        		$gpp_query->the_post();
        		$type = get_post_format();
        		if($type=='video') {
        			get_template_part( 'content', 'video' );
        		} else {
        			get_template_part( 'content', 'testimonial' );
        		}
			endwhile; endif; ?>
			<div class="cl"></div>
		</div>
		<div class="testimonials-buttons">
          <div class="testimonials-buttons-item testimonials-buttons-item--prev"><img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon_flip.png" alt="" /></div>
          <div class="testimonials-buttons-item testimonials-buttons-item--next"><img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon.png" alt="" /></div>
        </div>
	</div>
		

	<? wp_reset_query();
	return ob_get_clean();  
}
add_shortcode( 'gpp_testimonials', 'gpp_testimonials_function' );

function mc_testimonials_function( $atts ) {
	$cat_id = get_cat_ID('Testimonial MC');
	$args = array ( 'cat' => $cat_id );
	$mc_query = new WP_Query( $args );
	ob_start(); ?> 

	<div class="cl"></div>
  	<div class="content testimonials">
    	<div id="mcv-slider" class="testimonials-wrapper" data-active="1" style="left:0%;">
			<?php if ( $mc_query->have_posts() ): while ( $mc_query->have_posts() ) :
        		$mc_query->the_post();
        		$type = get_post_format();
        		if($type=='video') {
        			get_template_part( 'content', 'video' );
        		} else {
        			get_template_part( 'content', 'testimonial' );
        		}
			endwhile; endif; ?>
			<div class="cl"></div>
		</div>
		<div class="testimonials-buttons">
          <div class="testimonials-buttons-item testimonials-buttons-item--prev"><img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon_flip.png" alt="" /></div>
          <div class="testimonials-buttons-item testimonials-buttons-item--next"><img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon.png" alt="" /></div>
        </div>
	</div>
		

	<? wp_reset_query();
	return ob_get_clean();  
}
add_shortcode( 'mc_testimonials', 'mc_testimonials_function' );



function testimonial_comment_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
	return "<div class='testimonials-item-comment'>".do_shortcode($content)."</div>";
}
add_shortcode( 'testimonial_comment', 'testimonial_comment_shortcode' );


function testimonial_author_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'author' => '',
			'from' => ''
		), $atts )
	);
	ob_start(); ?> 
	<div class="testimonials-item-author">
		<span><?php echo $author ?></span><br/>
		<span class="b300"><?php echo $from ?></span>
	</div>
	<? return ob_get_clean(); 
}
add_shortcode( 'testimonial_author', 'testimonial_author_shortcode' );

function single_column_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'id' => '',
			'class' => '',
		), $atts )
	);
	return "<div class='single_column_text auto long_text long_text--bigger ".$class."'>".do_shortcode($content)."</div>";
}
add_shortcode( 'single', 'single_column_shortcode' );


function calendar_shortcode( $atts ) {
	$cat_id = get_cat_ID('Event MC');
	$args = array ( 'cat' => $cat_id );
	$mc_query = new WP_Query( $args );

	$cat_id = get_cat_ID('Event GPP');
	$args = array ( 'cat' => $cat_id );
	$gpp_query = new WP_Query( $args );

	ob_start(); ?>
	<div class="section calendar" id="calendar">
		<div class="content">
		  <div class="half-box left padding10">
		    <div class="calendar-logo">
		      <img src="<?php echo get_template_directory_uri()?>/gfx/gpp_calendar.png" alt="" class="margin-top" />
		    </div>

		    <?php if ( $gpp_query->have_posts() ): while ( $gpp_query->have_posts() ) :
        		$gpp_query->the_post();
					get_template_part( 'content', 'calendar' );
				endwhile; endif; ?>

		  </div>
		  <div class="half-box right padding10">
		    <div class="calendar-logo">
		      <img src="<?php echo get_template_directory_uri()?>/gfx/mcv_calendar.png" alt="" />
		    </div>

		    <?php if ( $mc_query->have_posts() ): while ( $mc_query->have_posts() ) :
        		$mc_query->the_post();
					get_template_part( 'content', 'calendar-odd' );
				endwhile; endif; ?>

		  </div>
		  <div class="cl"></div>
		</div>
	</div>
	<? return ob_get_clean(); 
}
add_shortcode( 'calendar', 'calendar_shortcode' );

function faq_shortcode( $atts ) {
	extract( shortcode_atts(
		array(
			'question' => '',
			'answer' => ''
		), $atts )
	);
	ob_start(); ?> 
	<div class='faq-item'>
	  <div class='faq-item-question'><?php echo $question ?></div>
	  <div class='faq-item-anwser'><?php echo $answer ?></div>
      <img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon.png" alt="" class='faq-item-more' />
	</div>
	<? return ob_get_clean(); 
}
add_shortcode( 'faq', 'faq_shortcode' );

// Add Shortcode
function cl_shortcode() {

	// Code
    return "<div class='cl'></div>";
}
add_shortcode( 'cl', 'cl_shortcode' );

// Add Shortcode
function logo_shortcode($atts , $content = null) {

	// Code
    return "<div class='calendar-logo'>".$content."</div>";
}
add_shortcode( 'logo', 'logo_shortcode' );



function subscribe_shortcode( $atts , $content = null ) {
	extract( shortcode_atts(
		array(
			'author' => '',
			'from' => ''
		), $atts )
	);
	ob_start(); ?> 
	<div class='subscribe' id='contact'>
    <div class='subscribe-form'>
      <div class='subscribe-form-header'>
        Get in touch
      </div>
      <?php echo do_shortcode($content) ?>
    </div>
  </div>
	<? return ob_get_clean(); 
}
add_shortcode( 'subscribe', 'subscribe_shortcode' );





