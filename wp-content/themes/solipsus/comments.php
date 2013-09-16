<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p><?php _e("This post is password protected. Enter the password to view comments.",TEMPLATE_DOMAIN); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background, thanks Kubrick */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

   <?php if ( have_comments() ) : ?>

	<h2 id="comments">
	<?php comments_number(__('No Comments',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN)); ?>
	<?php if ( comments_open() ) : ?>
	<a href="#postcomment" title="<?php _e('Jump to the comments form',TEMPLATE_DOMAIN); ?>">&raquo;</a>
	<?php endif; ?>
	</h2>
	

<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<ol id="commentlist" class="commentlist">
<?php wp_list_comments('type=comment&callback=list_comments'); ?>
</ol>


<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<?php endif; ?>


 <?php if ( $post->ping_status == "open" ) : ?>
 <?php if ( ! empty($comments_by_type['pings']) ) : ?>
 <div class="entry">
	<h3><?php _e('Trackbacks/Pingbacks',TEMPLATE_DOMAIN); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>





	<p class="small"> 
	{ <?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post',TEMPLATE_DOMAIN)); ?>}
	<?php if ( pings_open() ) : ?>
	&#183; { <a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack',TEMPLATE_DOMAIN);?> <abbr title="<?php _e('Uniform Resource Identifier',TEMPLATE_DOMAIN);?>">URI</abbr></a>
	<?php endif; ?>
	</p>




<?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post-> comment_status) : ?>
		<?php /* No comments yet */ ?>
		
	<?php else : // comments are closed ?>
		<?php /* Comments are closed */ ?>
		<p><?php _e('Comments are closed.',TEMPLATE_DOMAIN); ?></p>
		
	<?php endif; ?>

<?php endif; ?>




<?php if ('open' == $post-> comment_status) : ?>
          <div id="respond">
	<h2 id="postcomment"><?php _e('Leave a Comment',TEMPLATE_DOMAIN); ?></h2>
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p><?php _e('You must be',TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in',TEMPLATE_DOMAIN); ?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN); ?></p>

	
	<?php else : ?>
	
		<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">
   <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

		<?php if ( $user_ID ) : ?>
		
<p><?php _e('Logged in as',TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN); ?>"><?php _e('Log out &raquo;',TEMPLATE_DOMAIN); ?></a></p>

		<?php else : ?>
	
		<p>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
		<label for="author"><?php _e('Name',TEMPLATE_DOMAIN);?> <?php if ($req) _e('(required)',TEMPLATE_DOMAIN); ?></label>
		</p>
		
		<p>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
		<label for="email"><?php _e('E-mail',TEMPLATE_DOMAIN);?> (<?php if ($req) _e('required',TEMPLATE_DOMAIN); ?> <?php _e('never displayed',TEMPLATE_DOMAIN);?>)</label>
		</p>

		<p>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
		<label for="url"><abbr title="<?php _e('Uniform Resource Identifier',TEMPLATE_DOMAIN);?>">URI</abbr></label>
		</p>

		<?php endif; ?>

  <br />

	<p>
	<textarea name="comment" id="comment" cols="70" rows="10" tabindex="4"></textarea>
	</p>

	<p>
	<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment',TEMPLATE_DOMAIN);?>" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	</p>

   <?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

	</form>
    </div>
	<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
