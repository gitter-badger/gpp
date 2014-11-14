<?php
/**
 * @package gpp
 */
?>
<div class="testimonials-item">
	<div class="testimonials-item-photo">
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<img src="<?php echo $url ?>">
	</div>
	<?php the_content() ?>
</div>