<?php

////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////

// Uncomment this to test your localization, make sure to enter the right language code.

//function test_localization( $locale ) {
//return "fr_FR";
//}
//add_filter('locale','test_localization');


load_theme_textdomain('minimalist', TEMPLATEPATH . '/languages/');



if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Sidebar',
		'before_widget' => '', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h2 class="menuheader">',
		'after_title' => '</h2><div class="menucontent">',
	));

// WP-techdesigns01 Page Navigation 	
	function widget_techdesigns01_pagenav() {
?>
<h2 class="menuheader">Pages</h2>
<div class="menucontent">
<ul>
<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
</ul>
</div>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Pages'), 'widget_techdesigns01_pagenav');

// WP-techdesigns01 Search 	
	function widget_techdesigns01_search() {
?>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_techdesigns01_search');

// WP-techdesigns01 Links 	
	function widget_techdesigns01_links() {
?>


<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Links'), 'widget_techdesigns01_links');



////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////



function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>


<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<div class="gravatarside">
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>
</div>
<div class="commenticon">
<?php comment_type('Comment','Trackback','Pingback'); ?> <?php _e('from', 'minimalist'); ?>
<?php if ('' != get_comment_author_url()) { ?><a href="<?php comment_author_url(); ?>"><?php comment_author() ?></a><?php } else { comment_author(); } ?>
<?php edit_comment_link('[e]',' | '); ?> - <?php comment_date() ?> at <?php comment_time(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

<div class="commenttext"><?php comment_text() ?></div>

<?php if ($comment->comment_approved == '0') : ?>
<p><?php _e('Thank you for your comment! It has been added to the moderation queue and will be published here if approved by the webmaster.', 'minimalist'); ?></p>
<?php endif; ?>
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


////////////////////////////////////////////////////////////////////////////////
// CUSTOM IMAGE HEADER
////////////////////////////////////////////////////////////////////////////////

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', ''); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 640); //width is fixed
define('HEADER_IMAGE_HEIGHT', 250);
define('NO_HEADER_TEXT', true );

function minimalist_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

add_custom_image_header('', 'minimalist_admin_header_style');

















