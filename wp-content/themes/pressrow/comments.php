<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.');?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<div id="comments">

<?php if ( have_comments() ) : ?>

<h2 class="comment_head"><?php comments_number(__('0 Comments'), __('1 Comment'), __('% Comments'));?></h2>
	
<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<ul class="comment_list">
<?php wp_list_comments('type=comment&callback=list_comments'); ?>
</ul>


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


	
	 <?php else : // this is displayed if there are no comments so far ?>
	
	  <?php if ('open' == $post->comment_status) : ?> 
			<!-- If comments are open, but there are no comments. -->
			
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<h2 class="comment_head"><?php _e("Comments are closed.",TEMPLATE_DOMAIN); ?></h2>
			
		<?php endif; ?>
	<?php endif; ?>
	
	
	<?php if ('open' == $post->comment_status) : ?>
	<div id="respond">
	<h2 class="form_head"><?php _e('Leave a Reply',TEMPLATE_DOMAIN);?></h2>
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>


<p><?php _e('You must be',TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in',TEMPLATE_DOMAIN); ?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN); ?></p>


	<?php else : ?>
	
	<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="comment_form">

  <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

		<?php if ( $user_ID ) : ?>

       <p><?php _e('Logged in as',TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN); ?>"><?php _e('Log out &raquo;',TEMPLATE_DOMAIN); ?></a></p>




		<?php else : ?>
		
			<p><input type="text" class="text_input" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><label for="author"><?php _e('Name',TEMPLATE_DOMAIN);?> <?php if ($req) echo "__('(required)')"; ?></label></p>

			<p><input type="text" class="text_input" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><label for="email"><?php _e('Mail (will not be published)',TEMPLATE_DOMAIN);?> <?php if ($req) echo "__('(required)')"; ?></label></p>

			<p><input type="text" class="text_input" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><label for="url"><?php _e('Website',TEMPLATE_DOMAIN);?></label></p>
		
		<?php endif; ?>
		
		<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:');?> <?php echo allowed_tags(); ?></small></p>-->
		
		<p><textarea class="text_area" name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
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

</div>