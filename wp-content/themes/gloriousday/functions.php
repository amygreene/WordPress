<?php

define('TEMPLATE_DOMAIN', 'gloriousday');

////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain('gloriousday', TEMPLATEPATH . '/languages/');

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
$GLOBALS['comment'] = $comment;
 global $commentcount;
    if(!$commentcount) $commentcount = 0;
    $commentcount ++;
?>
<?php if ($comment->comment_author_email == get_the_author_email()) { $alt_x = 'authorcomment'; } ?>

<li <?php comment_class( $alt_x ); ?> id="comment-<?php comment_ID(); ?>">
<div class="cmtinfo"><small class="commentmetadata"></small><cite>
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;<?php comment_author_link() ?></cite><em><?php _e('on');?> <?php comment_date('d M Y') ?> <?php _e('at',TEMPLATE_DOMAIN);?> <?php comment_time() ?> <?php edit_comment_link(__('edit this',TEMPLATE_DOMAIN),'',''); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></em><a href="#comment-<?php comment_ID() ?>" title=""><span class="number"><?php echo $commentcount ?></span></a></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.',TEMPLATE_DOMAIN);?></em>
			<?php endif; ?>
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







if ( function_exists('register_sidebar') )
{
register_sidebar(array('name'=>'Left Sidebar',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		));
register_sidebar(array('name'=>'Right Sidebar',
		'before_widget' => '<li>', 
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',     
		));
}
// Custom Header Image Support

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/img/header.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 900);
define('HEADER_IMAGE_HEIGHT', 180);
define( 'NO_HEADER_TEXT', true );


function theme_admin_header_style() {
?>
<style type="text/css">
#headimg {
	background:#fff url(<?php header_image() ?>) no-repeat center;  
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg * {
  display:none;
}
</style>
<?php
}
function theme_header_style() {
?>
<style type="text/css">
  #splash
  {
  background:url(<?php header_image(); ?>) no-repeat center;
  height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
  width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
	add_custom_image_header('theme_header_style', 'theme_admin_header_style');
}
?>