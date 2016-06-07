<?php 
register_sidebar(array(
	'name' => __('1st Right Sidebar'),
	'id' => 'first-right-sidebar',
	'description'   => '',
	'before_widget' => '<div class="1st-r-sidebar">',
	'after_widget' => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'

));

register_sidebar(array(
	'name' => __('2nd Right Sidebar'),
	'id' => 'second-right-sidebar',
	'description'   => '',
	'before_widget' => '<div class="2nd-r-sidebar">',
	'after_widget' => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>'

));

function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
}
add_action( 'customize_register', 'mytheme_customize_register' );

include('admin/govi-admin.php');
