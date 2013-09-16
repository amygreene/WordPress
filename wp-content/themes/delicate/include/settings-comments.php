<?php 
function natty_themecomment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   switch ( $comment->comment_type ) :
		case '' : ?>

   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">   		
   <div id="comment-<?php comment_ID(); ?>">
   <div class="comment-author vcard"><?php echo get_avatar( $comment, $size = '48' ); ?>
   <cite class="fn"><?php comment_author_link() ?> <?php $test = get_comment_author_url(); ?></cite> <span class="says"><?php _e('says:', 'delicate');?></span></div>
   
   <div class="comment-meta commentmetadata"><a href="<?php the_permalink() ?>#comment-<?php comment_ID() ?>"><?php comment_date('l, jS F Y') ?> <?php _e('at', 'delicate');?> <?php comment_time() ?></a></div>
   <div class="clear"></div>
   <div class="comment-entry">
      <?php comment_text() ?>
   </div>
   
    <div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
    <div class="clear"></div>
    </div>
   <?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'delicate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'delicate'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
	
} ?>