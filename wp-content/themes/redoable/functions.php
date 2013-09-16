<?php
/* Current version of Redoable */
$current = '1.2';

define('TEMPLATE_DOMAIN','redo_domain');
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

<li <?php comment_class(); ?> id="comment-<?php comment_ID($comment_index); ?>">
<a href="#comment-<?php comment_ID(); ?>" class="counter" title="<?php _e('Permanent Link to this Comment','redo_domain'); ?>"><?php echo $comment_index; ?></a>
<span class="commentauthor"><?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;
<?php comment_author_link(); ?></span>

				<small class="comment-meta">
				<?php
					printf('<a href="#comment-%1$s" title="%2$s">%3$s</a>',
						get_comment_ID(),
						(function_exists('time_since')?
							sprintf(__('%s ago.','redo_domain'),
								time_since(abs(strtotime($comment->comment_date_gmt . " GMT")), time())
							):
							__('Permanent Link to this Comment','redo_domain')
						),
						sprintf(__('%1$s at %2$s','redo_domain'),
							get_comment_date(get_option('date_format')),
							get_comment_time()
						)
					);
				?>
				<?php if (function_exists('quoter_comment')) { quoter_comment(); } ?>
				<?php if (function_exists('jal_edit_comment_link')) { jal_edit_comment_link(__('Edit','redo_domain'), '<span class="comment-edit">','</span>', '<em>(Editing)</em>'); } else { edit_comment_link(__('Edit','redo_domain'), '<span class="comment-edit">', '</span>'); } ?>
				</small>

				<div class="comment-content">
					<?php comment_text(); ?>
                    <p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
				</div>

<?php if ('0' == $comment->comment_approved) { ?><p class="alert"><strong><?php _e('Your comment is awaiting moderation.','redo_domain'); ?></strong></p><?php } ?>



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



define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE_WIDTH', 730);
define('HEADER_IMAGE_HEIGHT', 180);
define('HEADER_IMAGE', '');

function redo_admin_header_style() {
?>
<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	background-color: #900;
}
#headimg h1 {
	font-family:"Century Gothic","Lucida Grande",Verdana,Arial !important;
	font-size: 38px;
	font-weight: normal;
	padding-left: 18px;
	padding-top: 120px;
	margin: 0;
}
#headimg h1 a {
	color:#<?php header_textcolor() ?>;
	border: none;
	text-decoration: none;
}

#headimg #desc {
	display: none;
	background-image:
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>
#headerimg h1, #headerimg #desc {
	display: none;
}
#headimg h1 a, #headimg #desc {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
<?php } ?>
</style>
<?php
}

function redo_header_style() {
?>
<style type="text/css">
#header_content {
	background:#900 url(<?php header_image() ?>) center repeat-y;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header_content #title {
	display: none;
}
<?php } else { ?>
#header_content h1 a, #header_content h1 a:hover {
	color: #<?php header_textcolor() ?>;
}	
<?php } ?>
</style>
<?php
}

add_custom_image_header('redo_header_style', 'redo_admin_header_style');

$themecolors = array(
	'bg' => '333333',
	'border' => '111111',
	'text' => 'eeeeee',
	'link' => 'cccccc'
);
$content_width = 655; // pixels

#require(TEMPLATEPATH . '/options/app/info.php');

function get_redo_ping_type($trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
	$type = get_comment_type();
	switch( $type ) {
		case 'trackback' :
			return $trackbacktxt;
			break;
		case 'pingback' :
			return $pingbacktxt;
			break;
	}
	return false;
}

/* By Mark Jaquith, http://txfx.net */
function redo_nice_category($normal_separator = ', ', $penultimate_separator = ' and ') { 
	$categories = get_the_category(); 

	if (empty($categories)) { 
		_e('Uncategorized','redo_domain'); 
		return; 
	} 

	$thelist = ''; 
	$i = 1; 
	$n = count($categories); 

	foreach ($categories as $category) { 
		if (1 < $i and $i != $n) {
			$thelist .= $normal_separator;
		}

		if (1 < $i and $i == $n) {
			$thelist .= $penultimate_separator;
		}

		$thelist .= '<a href="' . get_category_link($category->cat_ID) . '" title="' . sprintf(__("View all posts in %s"), $category->cat_name) . '">'.$category->cat_name.'</a>'; 
		++$i; 
	} 
	return apply_filters('the_category', $thelist, $normal_separator);
}

function redo_body_id() {
	if (get_option('permalink_structure') != '' and is_page()) {
		echo "id='" . get_query_var('name') . "'";
	}
}

// Semantic class functions from Sandbox 0.6.1 (http://www.plaintxt.org/themes/sandbox/)

// Template tag: echoes semantic classes in the <body>
function redo_body_class() {
	global $wp_query, $current_user;

	$c = array('wordpress', 'k2');

	redo_date_classes(time(), $c);

	is_home()       ? $c[] = 'home'       : null;
	is_archive()    ? $c[] = 'archive'    : null;
	is_date()       ? $c[] = 'date'       : null;
	is_search()     ? $c[] = 'search'     : null;
	is_paged()      ? $c[] = 'paged'      : null;
	is_attachment() ? $c[] = 'attachment' : null;
	is_404()        ? $c[] = 'four04'     : null; // CSS does not allow a digit as first character

	if ( is_single() ) {
		the_post();
		$c[] = 'single';
		if ( isset($wp_query->post->post_date) ) {
			redo_date_classes(mysql2date('U', $wp_query->post->post_date), $c, 's-');
		}
		foreach ( (array) get_the_category() as $cat ) {
			$c[] = 's-category-' . $cat->category_nicename;
		}
		$c[] = 's-author-' . get_the_author_login();
		rewind_posts();
	}

	else if ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}

	else if ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->category_nicename;
	}

	else if ( is_page() ) {
		the_post();
		$c[] = 'page';
		$c[] = 'page-author-' . get_the_author_login();
		rewind_posts();
	}

	if ( $current_user->ID )
		$c[] = 'loggedin';

	echo join(' ', apply_filters('body_class',  $c));
}

// Template tag: echoes semantic classes in each post <div>
function redo_post_class( $post_count = 1, $post_asides = false ) {
	global $post;

	$c = array('hentry', "p$post_count", $post->post_type, $post->post_status);

	$c[] = 'author-' . get_the_author_login();

	foreach ( (array) get_the_category() as $cat ) {
		$c[] = 'category-' . $cat->category_nicename;
	}

	redo_date_classes(mysql2date('U', $post->post_date), $c);

	if ( $post_asides ) {
		$c[] = 'redo-asides';
	}

	if ( $post_count & 1 == 1 ) {
		$c[] = 'alt';
	}

	echo join(' ', apply_filters('post_class', $c));
}

// Template tag: echoes semantic classes for a comment <li>
function redo_comment_class( $comment_count = 1 ) {
	global $comment, $post;

	$c = array($comment->comment_type, "c$comment_count");

	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);

		$c[] = "byuser commentauthor-$user->user_login";

		if ( $comment->user_id === $post->post_author ) {
			$c[] = 'bypostauthor';
		}
	}

	redo_date_classes(mysql2date('U', $comment->comment_date), $c, 'c-');

	if ( $comment_count & 1 == 1 ) {
		$c[] = 'alt';
	}
		
	if ( is_trackback() ) {
		$c[] = 'trackback';
	}

	echo join(' ', apply_filters('comment_class', $c));
}

// Adds four time- and date-based classes to an array
// with all times relative to GMT (sometimes called UTC)
function redo_date_classes($t, &$c, $p = '') {
	$t = $t + (get_option('gmt_offset') * 3600);
	$c[] = $p . 'y' . gmdate('Y', $t); // Year
	$c[] = $p . 'm' . gmdate('m', $t); // Month
	$c[] = $p . 'd' . gmdate('d', $t); // Day
	$c[] = $p . 'h' . gmdate('h', $t); // Hour
}

// Register the sidebar - This allows for multiple sidebars to be used.
if(function_exists('register_sidebars')) {
	register_sidebars(1, array('before_widget' => '<div id="%1$s" class="module %2$s">','after_widget' => '</div>'));
}

// this ends the admin page ?>
