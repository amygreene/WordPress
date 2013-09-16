<?php
//includes
include('functions/theme-admin.php');
include('functions/better-excerpts.php');
include('functions/slides-meta.php');

//scripts
add_action('wp_enqueue_scripts','my_theme_scripts_function');

function my_theme_scripts_function() {
	
	wp_deregister_script('jquery'); 
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"), false, '1.4.2'); 
	wp_enqueue_script('jquery');
	
	wp_enqueue_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js');
	
	if(is_front_page()) :
	wp_enqueue_script('nivoSlider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.pack.js');
	endif;
}


//Remove WordPress Version For Security Reasons
remove_action('wp_head', 'wp_generator');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

//Image resizing
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'header-image',  880, 280, true );
add_image_size( 'singe-post-image',  200, 150, true );
add_image_size( 'post-image',  160, 120, true );
add_image_size( 'related-image',  100, 80, true );
}

// Enable Custom Background
add_custom_background();

//Add Pagination Support
include('functions/pagination.php');

//Register Sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown on the right-hand side.',
'before_widget' => '<div class="box">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

// Limit Post Word Count
function new_excerpt_length($length) {
	return 30;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function gpp_excerpt($text) { 
	return str_replace('[...]', '...', $text); 
	} 
add_filter('the_excerpt', 'gpp_excerpt');

// Register Navigation Menus
register_nav_menus(
	array(
	'primary'=>__('Top Menu'),
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// menu fallback
function default_menu() {
	require_once (TEMPLATEPATH . '/includes/default-menu.php');
}
add_action( 'init', 'create_post_types' );
function create_post_types() {
// Define Post Type For Slider
  register_post_type( 'slides',
    array(
      'labels' => array(
		'name' => _x( 'Slides', 'post type general name' ), // Tip: _x('') is used for localization
		'singular_name' => _x( 'Slide', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Slide' ),
		'add_new_item' => __( 'Add New Slide' ),
		'edit_item' => __( 'Edit Slide' ),
		'new_item' => __( 'New Slide' ),
		'view_item' => __( 'View Slide' ),
		'search_items' => __( 'Search Slides' ),
		'not_found' =>  __( 'No Slides found' ),
		'not_found_in_trash' => __( 'No Slides found in Trash' ),
		'parent_item_colon' => ''
      ),
      'public' => true,
	  'exclude_from_search' => true,
	  'supports' => array('title','thumbnail'),
    )
  );
}
?>