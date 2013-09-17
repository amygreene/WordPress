<?php
define('TEMPLATE_DOMAIN','trevilian-way');
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
$GLOBALS['comment'] = $comment;
 global $commentcount;
    if(!$commentcount) $commentcount = 0;
    $commentcount ++; ?>

    <div <?php comment_class('comment-body'); ?> id="comment-<?php comment_ID(); ?>">


			<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;

<cite><?php comment_author_link() ?>&nbsp;&nbsp;<?php comment_date('F d, Y') ?>&nbsp;&nbsp;<?php comment_time() ?>&nbsp;&nbsp;<?php echo $commentcount; ?></cite>

 <?php if ($comment->comment_approved == '0') : ?>
				<p><strong><?php _e('Your comment is awaiting moderation.',TEMPLATE_DOMAIN);?></strong></p>
			<?php endif; ?>

			<?php comment_text() ?>

			<p><?php edit_comment_link('e','',''); ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>

		</div>

		<span class="clearer"></span>

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
define('HEADER_IMAGE_WIDTH', 960); //width is fixed
define('HEADER_IMAGE_HEIGHT', 150);
define('NO_HEADER_TEXT', true );

function ty_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

add_custom_image_header('', 'ty_admin_header_style');













	// Special thanks to Johnny Spade (http://www.johnnyspade.com)  in the WP Support forums (http://wordpress.org/support/topic/111551?replies=11)
	// And Otto42 (http://ottodestruct.com/blog/) in the support forums also (http://wordpress.org/support/topic/86875#post-443392)
	
	if ( function_exists('register_sidebar') )
	{
		register_sidebar(array('name'=>'Index Top Right Only',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
		register_sidebar(array('name'=>'Widget Block Wide',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
		register_sidebar(array('name'=>'Widget Block 1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
		register_sidebar(array('name'=>'Widget Block 2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
		register_sidebar(array('name'=>'Widget Block 3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>', // Removes </li>
		'before_title' => '<h3>', // Replaces <h2>
		'after_title' => '</h3>', // Replaces </h2>
		));
		
		function unregister_problem_widgets()
		{
			unregister_sidebar_widget('Links');
			unregister_sidebar_widget('Search');
		}
		add_action('widgets_init','unregister_problem_widgets');
	}
?>