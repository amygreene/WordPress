<?php
////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain('benevolence', TEMPLATEPATH . '/languages/');

////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
}


////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////



function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
    <?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;
 <?php comment_author_link() ?>
    <?php comment_date(__('m.d.y','benevolence')); ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a> <?php edit_comment_link(__(' Edit This ','benevolence'), ' |'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>

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
	'text' => '000000',
	'link' => 'ff3333'
	);

load_theme_textdomain('benevolence');


function benevolence_widgets_init() {
	register_sidebars(1);
	register_sidebar_widget(__('Search'), 'benevolence_search', null, 'search');
	unregister_widget_control('search');
}
add_action('widgets_init', 'benevolence_widgets_init');

function benevolence_search() {
?>
<li>
	<form id="searchform" method="get" action="<?php bloginfo('url'); ?>">
	<h2><?php _e('Search:','benevolence'); ?></h2>
	<input type="text" class="input" name="s" id="search" size="15" />
	<input name="submit" type="submit" tabindex="5" value="<?php _e('GO','benevolence'); ?>" />
	</form>
</li>
<?php
}

?>
<?php

define('HEADER_TEXTCOLOR', '000000');
define('HEADER_IMAGE', '%s/images/masthead.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 700);
define('HEADER_IMAGE_HEIGHT', 225);

function header_style() {
?>
<style type="text/css">
#masthead{
	background: url(<?php header_image() ?>) no-repeat;
}
<?php if ( 'blank' == get_theme_mod('header_textcolor', HEADER_TEXTCOLOR) ) { ?>
#blogTitle, #blogTitle a {
	display: none;
}
<?php } else { ?>
#masthead h1#blogTitle, #masthead #blogTitle a, #blogTitle a:hover {
	color: #<?php header_textcolor() ?>;
}

<?php } ?>
</style>
<?php
}

function benevolence_admin_header_style() {
?>
<style type="text/css">

#headimg {
	position: relative;
	top: 0px;
	background: url(<?php header_image() ?>);
 	width: 700px;
 	height: 225px;
	margin: 0px;
	margin-top: 0px;
}

#headimg h1 {
	position: relative;
	top: 50px;
	left: 20px;
	font-family: 'Arial Black';
	color: #<?php header_textcolor() ?>;
	font-size: 8pt;
	text-transform: uppercase;
	text-align: left;
}

#headimg h1 a {
	color: #<?php header_textcolor() ?>;
	border-bottom: none;
}

#desc { display: none; }

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

add_custom_image_header('header_style', 'benevolence_admin_header_style');

?>
