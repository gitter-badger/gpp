<?php
/**
 * @package gpp
 */
?>
<div class="calendar-event odd">
  <div class="calendar-event-highlights">
    <img src="<?php echo get_template_directory_uri()?>/gfx/calendar_icon.png" alt="" class="calendar-event-icon" />
    <span class="calendar-event-date">Date:</span>
    <span class="calendar-event-date uppercase b700"><?php echo date("d F Y", strtotime(get_field("date"))); ?></span>
    <img src="<?php echo get_template_directory_uri()?>/gfx/arrow_icon.png" alt="" class="calendar-event-more" />
    <div class="cl"></div>
  </div>
  <div class="calendar-event-dt">
    <table class="calendar-event-details">
      <?php $location = get_post_custom_values( 'Location' ); ?>
      <?php $time = get_post_custom_values( 'Time' ); ?>
      <tr>
        <td>Location:</td>
        <td><strong><?php echo get_field("location") ?></strong></td>
      </tr>
      <tr>
        <td>Time:</td>
        <td><strong><?php echo get_field("time") ?></strong></td>
      </tr>
      <tr>
        <td colspan="2">
          <?php the_content() ?>
        </td>
      </tr>
    </table>
  </div>
</div>