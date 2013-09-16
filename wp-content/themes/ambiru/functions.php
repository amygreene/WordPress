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


load_theme_textdomain('ambiru', TEMPLATEPATH . '/languages/');



if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Sidebar 1',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

register_sidebar(array('name'=>'Sidebar 2',
'before_widget' => '<div id="%1$s" class="widget %2$s">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

}


////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////



function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<cite>
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>
<?php comment_author_link() ?></cite> <?php _e('said','ambiru'); ?>:
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.','ambiru'); ?></em>
<?php endif; ?>
<br />
<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y','ambiru')) ?>  <?php _e('at','ambiru'); ?> <?php comment_time() ?></a> <?php edit_comment_link(__('e','ambiru'),'',''); ?><div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div></small>
<?php comment_text() ?>


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




define('HEADER_TEXTCOLOR', 'E5F2E9');
define('HEADER_IMAGE', '%s/images/header.png'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 500);
define('HEADER_IMAGE_HEIGHT', 225);

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '557799'
	);

function ambiru_admin_header_style() {
?>
<style type="text/css">
#headimg{
	font-family: Tahoma, Verdana, Arial, Helvetica, sans-serif;
	line-height:1.5;
	background: url(<?php header_image() ?>) no-repeat;
	background-repeat: no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	text-align:right;
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
	padding:30px 0;
}
#headimg h1{
	font-family: Sylfaen, Georgia, "Times New Roman", Times, serif;
	font-weight:normal;
	letter-spacing: -1px;
	margin:0;
	font-size:2em;
	margin-top:120px;
}
#headimg h1 a{
	color:#<?php header_textcolor() ?>;
	text-decoration: none;
	border-bottom: none;
}
#headimg #desc{
	color:#<?php header_textcolor() ?>;
	font-size:1em;
	margin-top:-0.5em;
}
#headimg h1, #desc{
	margin-right:30px;
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>
#headimg h1, #headimg #desc {
	display: none;
}
#headimg h1 a, #headimg #desc {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
<?php } ?>

</style>
<?php
}

function header_style() {
?>
<style type="text/css">
#header{
	background: url(<?php header_image() ?>) no-repeat;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header h1, #header #desc {
	display: none;
}
<?php } else { ?>
#header h1 a, #desc {
	color:#<?php header_textcolor() ?>;
}
#desc {
	margin-right: 30px;
}
<?php } ?>
</style>
<?php
}

add_custom_image_header('header_style', 'ambiru_admin_header_style');

?>
