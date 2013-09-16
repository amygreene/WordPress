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

/* This variable is for alternating comment background */
$oddcomment = 'alt';

?>
<div id="comments" class="commentlist">
<?php if ( have_comments() ) : ?>



	<div id="comments-meta">
		<h2 class="comments-title"><?php comments_number(__('No Comments',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN));?></h2>
		<p class="comments-feed"><?php comments_rss_link(__('Comments feed for this article',TEMPLATE_DOMAIN)); ?></p>
	</div>


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
	<h3><?php _e('Trackbacks/Pingbacks',TEMPLATE_DOMAIN); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>


<?php else : // comments are closed ?>


<?php endif; ?>


<div id="respond">
<?php if ('open' == $post->comment_status) : ?>

<?php // if registration is mandatory
if ( get_option('comment_registration') && !$user_ID ) : ?>


<p><?php _e('You must be',TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in',TEMPLATE_DOMAIN); ?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN); ?></p>

<?php else : ?>

		<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform"><fieldset>
       <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>
<?php // if user is logged in
	if ( $user_ID ) : ?>

		<div id="info-input">
			<p class="userinfo">You are <?php _e('Logged in as',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>
			<p><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN) ?>"><?php _e('Logout',TEMPLATE_DOMAIN);?> &raquo;</a></p>
			<?php if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>
		</div>

<?php // if user is not logged in - name, email and website fields
	else : ?>

			<div id="info-input">
				<label for="author"><?php _e("Name",TEMPLATE_DOMAIN); ?><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></label>
				<label for="email"><?php _e("Email",TEMPLATE_DOMAIN); ?><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></label>
				<label for="url"><?php _e("Website",TEMPLATE_DOMAIN); ?><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></label>
				<?php if(function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>
			</div>


<?php // actual comment form
endif; ?>
			<div id="comment-input">
				<label for="comment"><?php _e('Your Comment',TEMPLATE_DOMAIN);?></label>
				<textarea name="comment" id="comment" cols="60" rows="12" tabindex="4"></textarea>
				<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment',TEMPLATE_DOMAIN);?>" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
				<?php if (function_exists('live_preview')) { live_preview(); } ?>
				<?php //include('constants.php'); echo $commentsFormInclude; ?>
			</div>
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>
		</fieldset></form>


<?php endif; // If registration required and not logged in ?>

<?php endif; // If registration required and not logged in ?>

</div>

</div>

