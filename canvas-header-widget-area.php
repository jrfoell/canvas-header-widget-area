<?php
/*
Plugin Name: Canvas Header Widget Area
Plugin URI: http://github.com/jrfoell/canvas-header-widget-area
Description: Adds header widget area to WooThemes' (Canvas). From http://iamgw.com/canvas-framework/how-to-add-a-widgetised-header-area-for-woothemes-canvas/
Version: 1.0
Author: Justin Foell
Author URI: http://www.foell.org/justin
*/

// Register the new header widgetized area
add_action( 'init', 'custom_widgets_init' ); 
function custom_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Header', 'woothemes' ),
			'id' => 'header',
			'description' => __( 'A widgetized area in your right header area', 'woothemes' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>' ) );
}

// Add the code inside the header area
add_action( 'woo_header_inside', 'woo_header_widgetized' ); 
function woo_header_widgetized() {
	if ( woo_active_sidebar( 'header' ) ):
	?>
		<div class="header-widget">
		<?php woo_sidebar( 'header' ) ?>
		</div>
	<?php 
	endif;
}