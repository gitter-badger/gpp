<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package gpp
 */

get_header(); ?>

<div class="hero" id="home">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content() ?>
	<?php endwhile; // end of the loop. ?>     
<?php get_footer(); ?>
