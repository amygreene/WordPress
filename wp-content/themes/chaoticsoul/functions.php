<?php


////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain('chaoticsoul', TEMPLATEPATH . '/languages/');

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
<cite><?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'32',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 32 ); } ?>
<?php } ?>&nbsp;&nbsp;<?php comment_author_link() ?></cite> <?php _e('Says','chaoticsoul');?>:

<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.','chaoticsoul');?></em>
			<?php endif; ?>
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at','chaoticsoul');?> <?php comment_time() ?></a> <?php edit_comment_link(__('Edit','chaoticsoul'),'&nbsp;&nbsp;',''); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small>

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
	'bg' => '161410',
	'text' => '999999',
	'link' => 'd8d7d3',
	'border' => '161410'
	);

$content_width = 497;

// Widgets FTW!
function widget_chaoticsoul_links() {
	wp_list_bookmarks(array(
		'title_before' => '<h3>', 
		'title_after' => '</h3>', 
	));
}

function widget_chaoticsoul_search() {
?>
	<form method="get" id="searchform" action="/">
	<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" value="Journal Search&#8230;" />
	<!-- <input type="submit" id="searchsubmit" value="Search" /> -->
	</div>
	</form>
<?php
}

function chaoticsoul_widget_init() {
	register_sidebar(array(
  	'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar_widget(__('Links', 'widgets'), 'widget_chaoticsoul_links', null, 'links');
	register_sidebar_widget(__('Search', 'widgets'), 'widget_chaoticsoul_search', null, 'search');
}
add_action('widgets_init', 'chaoticsoul_widget_init');

// Custom Header FTW!

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/chaostheory.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 760);
define('HEADER_IMAGE_HEIGHT', 151);
define('NO_HEADER_TEXT', true );

function chaoticsoul_admin_header_style() {
?>

<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, #headimg #desc {
	display: none;
}
</style>

<?php }

add_custom_image_header('', 'chaoticsoul_admin_header_style');

?>
