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
	

 // Allow subscribers to see Private posts and pages  
$subRole = get_role( 'subscriber' );  
$subRole->add_cap( 'read_private_posts' ); 
$subRole->add_cap( 'read_private_pages' );

//Media Vault - restrict access to files for subscribers only
function wpst_mv_register_custom_permissions() {

  if ( function_exists( 'mgjp_mv_add_permission' ) ) {

    mgjp_mv_add_permission( 'subscriber-plus', array(
      'description'  => 'Subscribers and Above',
      'select'       => 'Subscriber',
      'logged_in'    => true, // whether the user must be logged in
      'run_in_admin' => true, // whether to run the access check in admin
      'cb'           => 'wpst_mv_restrict_only_for_nonsubscribers'
    ) );

  }

}
add_action( 'after_setup_theme', 'wpst_mv_register_custom_permissions' );

function wpst_mv_restrict_only_for_nonsubscribers() {

  if ( current_user_can( 'read_private_pages' ) )
    return true;

  return false;
}

?>