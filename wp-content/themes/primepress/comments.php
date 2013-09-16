<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die (__('Please do not load this page directly. Thanks!', 'primepress'));

	if ( post_password_required() ) {

		echo __('<p class="nocomments">This post is password protected. Enter the password to view comments.</p>', 'primepress');

		return;

	}

?>

	



<?php

	if ( have_comments() ) : ?>

	<h3 id="comments" class="comments-number"><?php comments_number(__('No Comments', 'primepress'), __('One Comment', 'primepress'), __('% Comments', 'primepress') );?></h3>

	

	<ol class="commentlist">

		<?php wp_list_comments(array('style' => 'ol')); ?>

	</ol>

	

	<div class="navigation comment-nav clearfix">

		<div class="alignleft"><?php previous_comments_link(__('&#8592; Older Comments', 'primepress')) ?></div>

		<div class="alignright"><?php next_comments_link(__('Newer Comments &#8594;', 'primepress')) ?></div>

	</div>

	

	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) :

			// If comments are open, but there are no comments.

		else : // comments are closed

			{ echo __("<p class='nocomments'>Comments are closed.</p>", 'primepress'); }

		endif;

	endif;

?>



	

	

<?php if ('open' == $post->comment_status) : ?>



<div id="respond">



	<h3><?php comment_form_title( __('Leave a Reply', 'primepress'), __('Leave a Reply to %s', 'primepress') ); ?></h3>



	<div class="cancel-comment-reply">

		<small><?php cancel_comment_reply_link(); ?></small>

	</div>



	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

		<p class="comment-login"><?php _e('You must be', 'primepress'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'primepress'); ?></a> <?php _e('to post a comment.', 'primepress'); ?></p>

	

	<?php else : ?>



	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">



	<?php if ( $user_ID ) : ?>

		

		<p class="comment-login"><?php _e('Logged in as', 'primepress'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'primepress'); ?>"><?php _e('Log out &raquo;', 'primepress'); ?></a></p>

	

	<?php else : ?>

		

		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

		<label for="author"><small><strong><?php _e('Name', 'primepress'); ?></strong> <?php if ($req) echo "(required)"; ?></small></label></p>

		

		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />

		<label for="email"><small><strong><?php _e('Email', 'primepress'); ?></strong> <?php _e('(will not be published)', 'primepress'); ?> <?php if ($req) echo "(required)"; ?></small></label></p>

		

		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />

		<label for="url"><small><strong><?php _e('Website', 'primepress'); ?></strong> (optional)</small></label></p>



	<?php endif; ?>



	<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->



	<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>



	<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit', 'primepress'); ?>" />

		<?php comment_id_fields(); ?>

	</p>

	<?php do_action('comment_form', $post->ID); ?>



	</form>



<?php endif; // If registration required and not logged in ?>

</div>



<?php endif; // if you delete this the sky will fall on your head ?>