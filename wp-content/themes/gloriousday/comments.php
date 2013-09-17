<br /><?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!',TEMPLATE_DOMAIN));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.",TEMPLATE_DOMAIN); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?><?php if ( ! empty($comments_by_type['comment']) ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses',TEMPLATE_DOMAIN), __('One Response',TEMPLATE_DOMAIN), __('% Responses',TEMPLATE_DOMAIN ));?> <?php _e('to',TEMPLATE_DOMAIN);?>  &#8220;<?php the_title(); ?>&#8221;</h3>

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

	<h3><?php _e('Trackbacks/Pingbacks',TEMPLATE_DOMAIN); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>

	<?php endif; ?>
    <?php endif; ?>






 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed at this time.',TEMPLATE_DOMAIN); ?></p>
		
	<?php endif; ?>
<?php endif; ?>
<div class="entry">
<p class="posted">
<?php if ($post->ping_status == "open") { ?>
	<a href="<?php trackback_url(display); ?>"><?php _e('Trackback URI',TEMPLATE_DOMAIN); ?></a> |
<?php } ?>
<?php if ($post-> comment_status == "open") {?>
	<?php comments_rss_link(__('Comments RSS',TEMPLATE_DOMAIN)); ?>
<?php }; ?>
</p>
</div>

<?php if ('open' == $post-> comment_status) : ?>
<div id="respond">
<h3 id="respond"><?php _e('Leave a Reply',TEMPLATE_DOMAIN);?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in',TEMPLATE_DOMAIN);?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN);?></p>
<?php else : ?>

<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">
<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>



<?php if ( $user_ID ) : ?>

<p><?php _e('Logged in as',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN) ?>"><?php _e('Logout',TEMPLATE_DOMAIN);?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" class="textbox" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name',TEMPLATE_DOMAIN);?> <?php if ($req) _e('(required)',TEMPLATE_DOMAIN); ?></small></label></p>

<p><input type="text" class="textbox" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (hidden)',TEMPLATE_DOMAIN); ?> <?php if ($req) _e('(required)',TEMPLATE_DOMAIN); ?></small></label></p>

<p><input type="text" class="textbox" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website',TEMPLATE_DOMAIN);?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:');?> <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

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