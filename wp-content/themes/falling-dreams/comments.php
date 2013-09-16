<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('Enter your password to view comments.','falling-dreams'); ?></p>
<?php return; endif; ?>

<h2 id="comments"><?php comments_number(__('No Comments','falling-dreams'), __('1 Comment','falling-dreams'), __('% Comments','falling-dreams')); ?>
<?php if ( comments_open() ) : ?>
	<a href="#postcomment" title="<?php _e("Leave a comment",'falling-dreams'); ?>">&raquo;</a>
<?php endif; ?>
</h2>

<?php if ( have_comments() ) : ?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<ol id="comments" class="commentlist">
<?php wp_list_comments('type=comment&callback=list_comments'); ?>
</ol>


<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<?php endif; ?>


 <?php if ( $post->ping_status == "open" ) : ?>
 <?php if ( ! empty($comments_by_type['pings']) ) : ?>
 <div class="entry">
	<h3><?php _e('Trackbacks/Pingbacks','falling-dreams'); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>


<?php else : // If there are no comments yet ?>
	<p><?php _e('No comments yet.','falling-dreams'); ?></p>
<?php endif; ?>

<p><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.','falling-dreams')); ?>
<?php if ( pings_open() ) : ?>
<a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack','falling-dreams');?> <abbr title="<?php _e('Uniform Resource Identifier','falling-dreams');?>">URI</abbr></a>
<?php endif; ?>
</p>

<?php if ( comments_open() ) : ?>
<div id="respond">
<h2 id="postcomment"><?php _e('Leave a comment','falling-dreams'); ?></h2>

<p><?php _e("Line and paragraph breaks automatic, e-mail address never displayed, <acronym title=\"Hypertext Markup Language\">HTML</acronym> allowed:",'falling-dreams'); ?> <code><?php echo allowed_tags(); ?></code></p>

<form action="<?php echo get_settings('home'); ?>/wp-comments-post.php" method="post" id="commentform">

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	   <label for="author"><?php _e('Name','falling-dreams'); ?></label> <?php if ($req) _e('(required)'); ?>
	<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
	<input type="hidden" name="redirect_to" value="<?php echo wp_specialchars($_SERVER['REQUEST_URI']); ?>" />
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
	   <label for="email"><?php _e('E-mail','falling-dreams'); ?></label> <?php if ($req) _e('(required)'); ?>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
	   <label for="url"><acronym title="<?php _e('Uniform Resource Identifier','falling-dreams');?>">URI</acronym></label>
	</p>

	<p>
	  <label for="comment"><?php _e('Your Comment','falling-dreams'); ?></label>
	<br />
	  <textarea name="comment" id="comment" cols="60" rows="4" tabindex="4"></textarea>
	</p>

	<p>
	  <input name="submit" id="submit" type="submit" tabindex="5" value="<?php _e('Say It!','falling-dreams'); ?>" />
	</p>
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
<?php else : // Comments are closed ?>
<p><?php _e('Sorry, the comment form is closed at this time.','falling-dreams'); ?></p>
<?php endif; ?>
