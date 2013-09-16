<?php

define('TEMPLATE_DOMAIN','pressrow');
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
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.',TEMPLATE_DOMAIN);?></em>
				<?php else : ?>

					<div class="comment_intro">
						<span class="comment_author">
                        <?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;<?php comment_author_link() ?></span><br />
						<span class="comment_meta"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php _e('at',TEMPLATE_DOMAIN);?> <?php comment_time() ?></a>
						<?php edit_comment_link(__('Edit',TEMPLATE_DOMAIN), ' &#183; ', ''); ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</span>

					</div>

					<div class="entry">
						<?php comment_text() ?>
					</div>
				<?php endif; ?>
		   

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
	'text' => '444444',
	'link' => '1c9bdc'
);

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/books.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 770);
define('HEADER_IMAGE_HEIGHT', 200);
define( 'NO_HEADER_TEXT', true );

function pressrow_admin_header_style() {
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

function header_style() {
?>
<style type="text/css">
#pic { background: url(<?php header_image() ?>) no-repeat; }
</style>
<?php
}

add_custom_image_header('header_style', 'pressrow_admin_header_style');

function widget_pressrow_search($args) {
	extract($args);
	if ( empty($title) )
		$title = __('Search', 'pressrow');
?>

		<?php echo $before_widget ?>
			<?php echo $before_title ?><label for="s"><?php echo $title ?></label><?php echo $after_title ?>
				<div class="sidebar_section">
					<form id="search_form" method="get" action="<?php bloginfo('home') ?>">
					<input id="s" name="s" class="text_input" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="10" />
					<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find &raquo;', 'sandbox') ?>" />
					</form>
				</div>
		<?php echo $after_widget ?>

<?php
}

function pressrow_widgets_init() {
	register_sidebars(1);
	register_sidebar_widget(__('Search', 'sandbox'), 'widget_pressrow_search', null, 'search');
	unregister_widget_control('search');
}
add_action('widgets_init', 'pressrow_widgets_init');

?>
