<?php
define('TEMPLATE_DOMAIN','fjords');
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

<div <?php comment_class(' comentarios'); ?> id="comment-<?php comment_ID(); ?>">

<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'25',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 25 ); } ?>
<?php } ?>&nbsp;&nbsp;<a href="<?php comment_author_url(); ?>">
<?php comment_author(); ?></a> <?php _e("wrote",TEMPLATE_DOMAIN); ?> @ <?php comment_date('F jS, Y') ?> <?php _e('at',TEMPLATE_DOMAIN);?> <?php comment_time() ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
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















if ( function_exists('register_sidebars') )
    register_sidebars(3);
	
function resize_youtube( $content ) {
	return str_replace( "width='425' height='350'></embed>", "width='240' height='197'></embed>", $content );
}
add_filter( 'the_content', 'resize_youtube', 999 );

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '888888',
	'link' => '8AB459'
);

define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/imagenes_qwilm/beach.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 900);
define('HEADER_IMAGE_HEIGHT', 200);

function header_style() {
?>
<style type="text/css">
#content, #sidebar-1, #sidebar-2, #sidebar-3  {
	background-image:url(<?php header_image() ?>);
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#hode h4, #hode span {
	display: none;
}
<?php } else { ?>
#hode a, #hode {
	color: #<?php header_textcolor() ?>;
}	
<?php } ?>
</style>
<?php
}

function admin_header_style() {
?>

<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1 {
font-family: "Lucida Grande",Tahoma,Arial,sans-serif;
font-size: 17px;
font-weight: bold;
margin-left: 15px;
padding-top: 15px;
}
#headimg h1 a {
	color:#<?php header_textcolor() ?>;
	border: none;
	text-decoration: none;
}
#headimg a:hover
{
	text-decoration:underline;
}
#headimg #desc
{
	font-weight:normal;
	color:#<?php header_textcolor() ?>;
	margin-left: 15px;
	padding: 0;
	margin-top: -10px;
font-family: "Lucida Grande",Tahoma,Arial,sans-serif;
	font-size: 11px;
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

<?php }

add_custom_image_header('header_style', 'admin_header_style');

?>