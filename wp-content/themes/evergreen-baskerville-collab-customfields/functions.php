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
	


	// Set up custom taxonomies for CSV Importer custom-taxonomies.csv example.

	add_action('init', 'csv_importer_taxonomies', 0);

	function csv_importer_taxonomies() {
	    register_taxonomy('vocab_category', 'vocabulary', array(
	        'hierarchical' => true,
	        'label' => 'Vocab Category',
	    ));
	    
	}


?>
