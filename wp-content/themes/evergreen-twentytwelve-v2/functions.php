<?php
//replace url in wp_register() to point to network_home register page
add_action( 'register' , 'register_replacement' );
function register_replacement( $link ){
	if ( ! is_user_logged_in() ) {
		if ( get_option('users_can_register') )
			$link = '<a href="' . network_home_url('register', 'login') . '">' . __('Register') . '</a>';
		else
			$link = '';
	} else 
	{
		$link = '<a href="' . admin_url() . '">' . __('Site Admin') . '</a>';
	}
	return $link;
}


/*-----------------------------------------------------------------------------------*/
/* Add Event Start and End times to Events RSS Feed
/*-----------------------------------------------------------------------------------*/

//if The Events Calendar plugin is active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('the-events-calendar/the-events-calendar.php') ){
	
	// Add Tribe Event Namespace
add_filter( 'rss2_ns', 'events_rss2_namespace' );
function events_rss2_namespace() {
    echo 'xmlns:ev="http://purl.org/rss/2.0/modules/event/"';
}

// Add Event Date to RSS Feeds
add_action('rss_item','tribe_rss_feed_add_eventdate');
add_action('rss2_item','tribe_rss_feed_add_eventdate');
add_action('commentsrss2_item','tribe_rss_feed_add_eventdate');
function tribe_rss_feed_add_eventdate() { ?>

  <ev:tribe_event_meta xmlns:ev="Event">
  <?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>

    <ev:startdate><?php echo tribe_get_start_date(); ?></ev:startdate>
    <ev:enddate><?php echo tribe_get_end_date(); ?></ev:enddate>

  <?php } else { ?>

    <ev:startdate><?php echo tribe_get_start_date(); ?></ev:startdate>

  <?php } ?>
  </ev:tribe_event_meta>

<?php }

}

?>