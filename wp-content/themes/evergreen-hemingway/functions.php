<?php
function evergreen_hemingway_setup() {
		
	// Custom header
	$args = array(		
		'default-image' => get_bloginfo('stylesheet_directory') . '/images/header.jpg',		
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'evergreen_hemingway_setup');

?>