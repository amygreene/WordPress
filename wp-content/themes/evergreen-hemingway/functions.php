<?php
function evergreen_hemingway_setup() {
		
	// Custom header
	$args = array(		
		'default-image' => get_bloginfo('stylesheet_directory') . '/images/header.jpg',		
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'evergreen_hemingway_setup');
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