<?php

	// Override parent theme default custom header image
	$args = array(
		'width'         => 1440,
		'height'        => 221,
		'default-image' => get_stylesheet_directory_uri() . '/images/header.jpg',
		'uploads'       => true,
		'header-text'  	=> false
		
	);
	add_theme_support( 'custom-header', $args );
	
?>
