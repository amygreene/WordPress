<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'notepad-chaos'));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'notepad-chaos'); ?><p>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="post-comments">

<?php if ( have_comments() ) : ?>

<small><?php comments_number(__('No Comments', 'notepad-chaos'), __('One Comment', 'notepad-chaos'), __('% Comments', 'notepad-chaos') );?> to</small>
<h4 id="comments">&#8220;<?php the_title(); ?>&#8221;</h4>

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
	<h3><?php _e('Trackbacks/Pingbacks', 'notepad-chaos'); ?></h3>

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
		<p class="nocomments"><?php _e('Comments are closed.', 'notepad-chaos'); ?></p>

	<?php endif; ?>

<?php endif; // end if comment ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p><?php _e('You must be', 'notepad-chaos'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in', 'notepad-chaos'); ?></a> <?php _e('to post a comment.', 'notepad-chaos'); ?></p>


<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e('Logged in as', 'notepad-chaos'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'notepad-chaos'); ?>"><?php _e('Logout &raquo;', 'notepad-chaos'); ?></a></p>

<?php endif; ?>


<?php if ( !$user_ID ) : ?>
<p><label for="author"><span class="name"><?php _e('Name:', 'notepad-chaos'); ?></span></label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="2" class="comment-field" /></p>
<p><label for="email"><span class="email"><?php _e('Email:', 'notepad-chaos'); ?></span></label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" class="comment-field" />
<span class="txt-email-sub"><?php _e('Email will not be published', 'notepad-chaos'); ?></span></p>
<p><label for="url"><span class="website"><?php _e('Website Address:', 'notepad-chaos'); ?></span></label> <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" class="comment-field" />
<span class="txt-website-example"><?php _e('Website example', 'notepad-chaos'); ?></span></p>

<?php endif; ?>

<p><span class="comments"><?php _e('Your Comment:', 'notepad-chaos'); ?></span> <textarea name="comment" id="comment" rows="10" tabindex="1" class="comment-box"></textarea></p>
<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
<p><input name="submit" type="submit" id="submit" class="btnComment" tabindex="5" value="<?php _e('Add Comment &raquo;', 'notepad-chaos'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>


<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

</div>


<?php endif; // if you delete this the sky will fall on your head ?>
</div>