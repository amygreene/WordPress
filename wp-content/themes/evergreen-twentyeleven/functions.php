<?php
remove_filter( 'HEADER_IMAGE_WIDTH', 'twentyeleven_header_image_width' );
remove_filter( 'HEADER_IMAGE_HEIGHT', 'twentyeleven_header_image_height' );
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'child_header_image_width', 1000 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'child_header_image_height', 150 ) );

function remove_default_headers() {
    unregister_default_headers(
        array(
            'wheel',
            'shore',
            'trolley',
            'pine-cone',
            'chessboard',
            'lanterns',
            'willow',
            'hanoi'
        )
    );
    register_default_headers( array(
        'canopy' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/canopy.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/canopy-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'canopy', 'twentyeleven-child' )
        ),

	'clocktower' => array(
        'url' => get_stylesheet_directory_uri() . '/images/headers/clocktower.jpg',
        'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/clocktower-thumbnail.jpg',
        /* translators: header image description */
        'description' => __( 'clocktower', 'twentyeleven-child' )
    ),

'aerial' => array(
    'url' => get_stylesheet_directory_uri() . '/images/headers/aerial.jpg',
    'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/aerial-thumbnail.jpg',
    /* translators: header image description */
    'description' => __( 'aerial', 'twentyeleven-child' )
),

'cherry' => array(
    'url' => get_stylesheet_directory_uri() . '/images/headers/cherryblossom.jpg',
    'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/cherryblossom-thumbnail.jpg',
    /* translators: header image description */
    'description' => __( 'cherry', 'twentyeleven-child' )
),

'redsquare' => array(
    'url' => get_stylesheet_directory_uri() . '/images/headers/redsquare.jpg',
    'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/redsquare-thumbnail.jpg',
    /* translators: header image description */
    'description' => __( 'redsquare', 'twentyeleven-child' )
)
    ) );
}
 
add_action( 'after_setup_theme', 'remove_default_headers', 11 );


//replace url in wp_register() to point to network_home register page
add_action( 'register' , 'register_replacement' );
function register_replacement( $link ){
	if ( ! is_user_logged_in() ) {
		if ( get_option('users_can_register') )
			$link = '<a href="' . network_home_url('register', 'login') . '">' . __('Register') . '</a>';
		else
			$link = '';
	} else {
		$link = '<a href="' . admin_url() . '">' . __('Site Admin') . '</a>';
	}
	return $link;
}


?>