<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
	<h2 class="mainhead"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>

	<span class="fleft"><?php previous_comments_link() ?></span> <span class="fright"><?php next_comments_link() ?></span>
	<br class="clear" />

	<ol class="commentlist">
		<?php wp_list_comments('callback=kreative_comment'); ?>
	</ol>

	<span class="fleft"><?php previous_comments_link() ?></span> <span class="fright"><?php next_comments_link() ?></span>
	<br class="clear" />

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

	<div id="respond">
		<h2 class="mainhead">Leave your comment</h2>		
		<div class="cancel-comment-reply"> <?php cancel_comment_reply_link('Cancel'); ?> </div>

		<div class="res_1 fleft">
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>
				<p><a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
				<!-- error number 7 --><p><input  name="submit" type="submit" id="submit" tabindex="5" value="Submit" /><?php comment_id_fields(); ?></p><!--error 7 -->
			<?php else : ?>				
				<p><label for="author">Name <?php if ($req) echo "(required)"; ?></label><input type="text" title="Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>
				<p><label for="email">Email <?php if ($req) echo "(required)"; ?></label><input type="text" title="Email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
				<p><label for="url">URL</label><input type="text" title="Website" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
				<p><input  name="submit" type="submit" id="submit" tabindex="5" value="Submit" /><?php comment_id_fields(); ?></p>
			<?php endif; ?>
			</div>			
			<div class="res_2 fright">
				<p><label for="commentt">Comment</small></label><textarea class="fright" name="comment" title="Your comment..." id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
				
				<?php do_action('comment_form', $post->ID); ?>
			</div>
			<div class="clear"></div>	
			</form>
	<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>