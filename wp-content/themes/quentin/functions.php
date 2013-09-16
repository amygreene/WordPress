<?php
define('TEMPLATE_DOMAIN','quentin');
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


////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////

function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<cite><?php _e('on', TEMPLATE_DOMAIN);?> <?php comment_date() ?> <?php _e('at', TEMPLATE_DOMAIN);?> <?php comment_time() ?>
<?php comment_author_link() ?> Said:
<?php edit_comment_link(__("Edit This", TEMPLATE_DOMAIN), ' |'); ?>
</cite>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', TEMPLATE_DOMAIN);?></em>
<?php endif; ?>
<div align="left">
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>
</div>
<?php comment_text() ?>
<p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>

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

////////////////////////////////////////////////////////////////////////////////
// CUSTOM IMAGE HEADER
////////////////////////////////////////////////////////////////////////////////

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', ''); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 728); //width is fixed
define('HEADER_IMAGE_HEIGHT', 160);


function quentin_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
</style>
<?php }

add_custom_image_header('', 'quentin_admin_header_style');

///////////////////////////////////////////////////////////////////////////////////////////////////////////

function header_custom_style() { ?>
<?php if('' != get_header_image() ) { ?>
<style type="text/css">
#header { background: url(<?php header_image() ?>) no-repeat !important; }
#header h1 a, #header h3 { color: #<?php header_textcolor() ?> !important; text-decoration: none; }
</style>
<?php } ?>
<?php }

add_action('wp_head', 'header_custom_style');


$themecolors = array(
	'bg' => 'f2e2c1',
	'border' => 'f2e2c1',
	'text' => '000000',
	'link' => '5b211a'
);

function quentin_widgets_init() {
	register_sidebars(1);
	register_sidebar_widget(__('Calendar'), 'widget_quentin_calendar', null, 'calendar');
	register_sidebar_widget(__('Search'), 'widget_quentin_search', null, 'search');
	unregister_widget_control('calendar');
	unregister_widget_control('search');
}
add_action('widgets_init', 'quentin_widgets_init');

function widget_quentin_calendar() {
?>
<li id="calendar">
	<?php get_calendar(); ?>
</li>
<?php
}

function widget_quentin_search() {
?>
<li id="search">
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
<input type="text" name="s" id="s" size="8" /> <input type="submit" name="submit" value="<?php _e('Search'); ?>" id="sub" />
</form>
</li>
<?php
}

?>
