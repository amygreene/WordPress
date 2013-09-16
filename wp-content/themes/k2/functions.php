<?php
define('TEMPLATE_DOMAIN','k2_domain');
////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain( TEMPLATE_DOMAIN, TEMPLATEPATH . '/languages/' );


////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 120, 120, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
}


// Current version of K2
define('K2_CURRENT', '1.0');

// Is this MU or no?
define('K2_MU', (isset($wpmu_version) or (strpos($wp_version, 'wordpress-mu') !== false)));

// Are we using K2 Styles?
define('K2_CHILD_THEME', get_stylesheet() != get_template());

// Features that can be disabled by Child Themes
@define( 'K2_STYLES', true );
@define( 'K2_HEADERS', true );

// WordPress compatibility
@define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
@define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content' );

/* Blast you red baron! Initialize the k2 system! */
require_once(TEMPLATEPATH . '/app/classes/k2.php');
K2::init();
?>