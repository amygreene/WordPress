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
	
	/** Downloads Monitor redirection to login page for non-logged in members trying to download content */

		function redirection() {
		    $redirected_url = $_SERVER['HTTP_REFERER'];
		    $download_url = $_SERVER['REQUEST_URI'];
		    $download_redirect = urlencode("{$redirected_url}?redirect-to={$download_url}");

		    return home_url()."/wp-login.php";

		}

		// filter calls

		add_filter('dlm_access_denied_redirect','redirection');
?>
