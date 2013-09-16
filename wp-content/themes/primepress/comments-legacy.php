<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	  	die (__('Please do not load this page directly. Thanks!', 'primepress'));

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

		  <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'primepress'); ?></p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="thread-alt" ';
?>

<!-- You can start editing here. -->

<?php $i=0; ?>

<?php if ($comments) : ?>
	<h3 class="comments-number"><?php comments_number(__('No Comments', 'primepress'), __('One Comment', 'primepress'), __('% Comments', 'primepress') );?> on &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<?php $i++; ?>
		<li <?php if ($comment->comment_author_email == get_the_author_email()) echo 'class="bypostauthor"'; else echo $oddcomment; ?> id="comment-<?php comment_ID() ?>">
			<span class="comment-counter"><a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment" rel="nofollow">#<?php echo $i; ?></a></span>
			<?php if(function_exists('get_avatar')) { ?><?php echo get_avatar( $comment, 32 ); ?><?php } ?>
			<span class="comment-author"><?php comment_author_link() ?></span><br/>
			<span class="comment-meta"> <?php _e('on', 'primepress'); ?> <?php comment_date('M jS, Y'); ?> <?php _e('at', 'primepress'); ?> <?php comment_time(); ?><?php edit_comment_link('edit','&nbsp;[',']'); ?></span>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'primepress'); ?></em>
			<?php endif; ?>
			<div class="comment-content">
				<?php comment_text() ?>
			</div>
		</li>
		
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="thread-alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h3 class="comments-number"><?php comments_number(__('No Comments', 'primepress'), __('One Comment', 'primepress'), __('% Comments', 'primepress') );?> on &#8220;<?php the_title(); ?>&#8221;</h3>
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'primepress'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<!--reply form-->
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



	</p>

	<?php do_action('comment_form', $post->ID); ?>



	</form>



<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>