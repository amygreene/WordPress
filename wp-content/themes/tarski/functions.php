<?php
define('TEMPLATE_DOMAIN','tarski');
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
if ($comment->comment_author_email == get_the_author_email()) { $author_com = ' author-comment'; }
?>


<div <?php comment_class( $author_com ); ?> id="comment-<?php comment_ID(); ?>">

<div class="comment-metadata">
<p class="comment-author"><?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;
<strong><?php comment_author_link(); ?></strong>&nbsp;&nbsp;&nbsp;<a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment"><?php comment_date('F jS, Y') ?> <?php _e('at'); ?> <?php comment_time() ?></a>
<?php edit_comment_link(__('Edit',TEMPLATE_DOMAIN), '(', ')'); ?></p>
</div>

<div class="comment-content">
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.',TEMPLATE_DOMAIN); ?></em>
<?php endif; ?>
<?php comment_text() ?>
<p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
</div>

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




$themecolors = array(
	'bg' => 'ffffff',
	'text' => '545454',
	'link' => '005a80'
);

$themeData = get_theme_data(TEMPLATEPATH . '/style.css');
$installedVersion = $themeData['Version'];
if(!$installedVersion) {
	$installedVersion = "unknown";
}

$highlightColor = "#a3c5cc";

// widgets!
if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Footer Widgets',
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// No CSS, just IMG call

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/greytree.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 720);
define('HEADER_IMAGE_HEIGHT', 180);
define('NO_HEADER_TEXT', true );

function tarski_admin_header_style() {
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
<?php
}

add_custom_image_header('', 'tarski_admin_header_style');

function tarski_nopaging($query) {
	if ( !is_home() && !is_feed() && '' === $query->get('nopaging') )
		$query->set('nopaging', 1);
}

add_action('parse_query', 'tarski_nopaging');

?>
