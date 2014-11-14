<?php
/**
 * @package gpp
 */
?>
<div class="testimonials-item">
	<?php $video = get_post_custom_values( 'VideoURL' ); ?>
	<a href="<?php echo $video[0] ?>" class="testimonials-item-video iframe">
	  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	  <img src="<?php echo $url ?>">
	  <span class="testimonials-item-video-play">
	    <img src="<?php echo get_template_directory_uri()?>/gfx/play.png" />
	    <span><?php the_title() ?></span>
	  </span>
	</a>
</div>