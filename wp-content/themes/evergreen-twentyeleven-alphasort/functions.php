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
        'fir' => array(
            'url' => get_stylesheet_directory_uri() . '/images/headers/fir.jpg',
            'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/fir-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'fir', 'twentyeleven-child' )
        ),

	'leaves' => array(
        'url' => get_stylesheet_directory_uri() . '/images/headers/leaves.jpg',
        'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/leaves-thumbnail.jpg',
        /* translators: header image description */
        'description' => __( 'leaves', 'twentyeleven-child' )
    ),

'aerial' => array(
    'url' => get_stylesheet_directory_uri() . '/images/headers/aerial.jpg',
    'thumbnail_url' => get_stylesheet_directory_uri() . '/images/headers/aerial-thumbnail.jpg',
    /* translators: header image description */
    'description' => __( 'aerial', 'twentyeleven-child' )
)
    ) );
}
 
add_action( 'after_setup_theme', 'remove_default_headers', 11 );

?>