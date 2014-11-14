<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package gpp
 */
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <html <?php language_attributes(); ?>>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link rel="stylesheet" type="text/css" href="//cloud.typography.com/7447712/771406/css/fonts.css" />


    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>
    
    <nav class="mobile_menu" id="mobile_menu">
      <div class="mobile_menu-top">
        <strong>MENU</strong>
      </div>
      <?php wp_nav_menu(array(
          'container'=> '',
          'menu_id' =>'',
          'menu_class' =>'mobile_menu-items',
          'theme_location' => 'primary' )); ?>
    </nav>
    
    <div class="relative_content" id="relative_content">
      
      <div class="mobile_menu_button" id="hamburger">
        <div class="mobile_menu_button-hamburger" id="hamburger_icon">
          <span>MENU</span>
        </div>
      </div>

      <header class="header" id="header">
        <?php wp_nav_menu(array(
          'container'=> 'nav',
          'menu_id' =>'',
          'menu_class' =>'header-top_nav',
          'theme_location' => 'primary' )); ?>
      </header>
