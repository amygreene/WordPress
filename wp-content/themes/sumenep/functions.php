<?php

define('TEMPLATE_DOMAIN','sumenep');
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
$GLOBALS['comment'] = $comment;  global $commentcount;
    if(!$commentcount) $commentcount = 0;
    $commentcount ++;
?>


<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<strong>
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'48',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 48 ); } ?>
<?php } ?>&nbsp;&nbsp;<?php comment_author_link() ?>
    </strong> <?php _e("Says:",TEMPLATE_DOMAIN); ?>&nbsp;&nbsp;<a href="#comment-<?php comment_ID(); ?>">#<?php echo $commentcount; ?></a>
    <?php if ($comment->comment_approved == '0') : ?>
    <em><?php _e('Your comment is awaiting moderation.',TEMPLATE_DOMAIN);?></em>
    <?php endif; ?>
    <br />
    <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">
    <?php comment_date('F jS, Y') ?> <?php _e('at',TEMPLATE_DOMAIN);?> <?php comment_time() ?>
    </a>
    <?php edit_comment_link(__('edit',TEMPLATE_DOMAIN),'',''); ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </small>
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


// check functions
  if ( function_exists('wp_list_bookmarks') ) //used to check WP 2.1 or not
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' and post_status = 'publish'");
	else
    $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
  if (0 < $numposts) $numposts = number_format($numposts);
	$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
		if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
// ----------------

function j_ShowAbout() { ?>
<li class="about">
  <h2><?php _e('About');?></h2>
  <p><img src="<?php bloginfo('stylesheet_directory');?>/images/you.jpg" alt="You Avatar" class="ileft" id="avatr"  /><?php $userdata = get_userdata(1); ?><?php if ($userdata->description != '') { ?>
<?php _e($userdata->description); ?></p><?php } else { ?>If you want edit me? just go to your profile than add description text as many you like. ^_*<?php } ?></p>
  </li>
<?php }	function j_ShowRecentPosts() {?>
<li class="boxr">
  <h2>Recent Post</h2>
  <ul>
    <?php wp_get_archives('type=postbypost&limit=10');?>
  </ul>
</li>
<?php }	?>
<?php

if ( function_exists('register_sidebars') )
	register_sidebars(1);

/* Some very fast and very simple header exchange magic 
	***	Keep on Trying
	***	Be Creative
*/

define('HEADER_IMAGE', '%s/images/bgpre.gif'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 480);
define('HEADER_IMAGE_HEIGHT', 150);

function admin_header_style() { ?>


<?php }

function header_style() { ?>

<style type="text/css">
#pre {
	background: #67EE4B url(<?php header_image(); ?>) left top no-repeat;
    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
}
</style>

<?php }

if ( function_exists('add_custom_image_header') ) {
  add_custom_image_header('header_style', 'admin_header_style');
} 

/* There you go, have a nice day */
?>