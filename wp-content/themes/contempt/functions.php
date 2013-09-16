<?php


////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain('contempt', TEMPLATEPATH . '/languages/');

////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 80, 80, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
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
<?php } ?>&nbsp;&nbsp;<?php comment_author_link() ?></cite> <?php _e('Says', 'contempt');?>:
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'contempt'); ?></em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at', 'contempt');?> <?php comment_time() ?></a> <?php edit_comment_link(__('Edit', 'contempt'),'&nbsp;&nbsp;',''); ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small>

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



$themecolors = array(
	'bg' => 'ffffff',
	'text' => '333333',
	'link' => '0066cc'
	);

define('HEADER_TEXTCOLOR', 'E5F2E9');
define('HEADER_IMAGE', '%s/images/blue_flower/head.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 750);
define('HEADER_IMAGE_HEIGHT', 140);

function header_style() {
?>
<style type="text/css">
#headerimg{
	background: url(<?php header_image() ?>) no-repeat;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header h1, #header .description {
	display: none;
}
<?php } else { ?>
#header h1 a, .description {
	color:#<?php header_textcolor() ?>;
}
<?php } ?>
</style>
<?php
}

function contempt_admin_header_style() {
?>
<style type="text/css">
#headimg{
	background: url(<?php header_image() ?>) no-repeat;
	background-repeat: no-repeat;
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
	font-family: 'Trebuchet MS','Lucida Grande',Verdana,Arial,Sans-Serif
}
#headimg h1{
font-family: 'Trebuchet MS','Lucida Grande',Verdana,Arial,Sans-Serif;
font-size: 40px;
font-weight: bold;
padding-top: 40px;
text-align: center;
margin: 0;
}
#headimg h1 a{
	color:#<?php header_textcolor() ?>;
	text-decoration: none;
	border-bottom: none;
}
#headimg #desc{
	color:#<?php header_textcolor() ?>;
font-size: 12px;
margin-top: -5px;
text-align: center;
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

add_custom_image_header('header_style', 'contempt_admin_header_style');

if ( function_exists('register_sidebars') )
	register_sidebars(1);

?>
