<?php
/*
Plugin Name: Subscribers Only
Description: Gives subcribers access to private pages and adds subscriber level to Media Vault file protection plugin
Version: 0.1
License: GPL
Author: Amy Greene
Author URI: http://blogs.evergreen.edy/amygreene
*/
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