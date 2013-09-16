<?php

////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain('tropicala', TEMPLATEPATH . '/languages/');


if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));



////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////



function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>


<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
      <p class="comment_meta"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link(__('edit', 'tropicana'),'&nbsp;&nbsp;',''); ?>&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</p>

      <?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'16',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 16 ); } ?>
<?php } ?>

      <cite><?php comment_author_link() ?> </cite> <?php _e('says:', 'tropicanla'); ?>
      <?php if ($comment->comment_approved == '0') : ?>
      <em><?php _e('Your comment is awaiting moderation.', 'tropicala'); ?></em>
      <?php endif; ?>

      <div class="comment_bubble">
        <?php comment_text() ?>
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
define('HEADER_IMAGE', '%s/images/masthead.png'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 723); //width is fixed
define('HEADER_IMAGE_HEIGHT', 147);
define('NO_HEADER_TEXT', true );

function tropicala_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

add_custom_image_header('', 'tropicala_admin_header_style');

?>