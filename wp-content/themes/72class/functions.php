<?php

////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
}



////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////

// Uncomment this to test your localization, make sure to enter the right language code.

//function test_localization( $locale ) {
//return "fr_FR";
//}
//add_filter('locale','test_localization');


load_theme_textdomain('72class', TEMPLATEPATH . '/languages/');



////////////////////////////////////////////////////////////////////////////////
// register widget
////////////////////////////////////////////////////////////////////////////////


if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '<!-- open block --><div id="%1$s" class="block widget %2$s">',
'after_widget' => '<!-- close block --></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));





////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////



function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

<div>
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>

<span class="count">
<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
</span>

<span class="commentauthor"><?php comment_author_link() ?></span><br />
<small class="comment-meta">
<?php comment_time() ?> - <?php comment_date('n-j-Y'); ?> <?php edit_comment_link(__('Edit'),'',''); ?>
</small>

<div class="comment-content">
<div class="cc"><?php comment_text(); ?> </div>

</div>


<?php if ('0' == $comment->comment_approved) { ?><p class="alert"><strong><?php _e('Your comment is awaiting moderation.'); ?></strong></p><?php } ?>

</div>

<?php

}

////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_ping
////////////////////////////////////////////////////////////////////////////////


function list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }

add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
global $id;
$comments_by_split = get_comments('post_id=' . $id);
$comments_by_type = &separate_comments($comments_by_split);
return count($comments_by_type['comment']);
}


//////////////////////////////////////////////////////////
///////////////////////HEADER IMG/////////////////////////
//////////////////////////////////////////////////////////

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', ''); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 750); //width
define('HEADER_IMAGE_HEIGHT', 150);
define( 'NO_HEADER_TEXT', true );


function class_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: 100%; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

if (function_exists('add_custom_image_header')) {
add_custom_image_header('', 'class_admin_header_style');
}







?>