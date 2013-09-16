<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'ambiru'));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','ambiru'); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<h3 id="comments"><?php comments_number(__('No Responses','ambiru'), __('One Response','ambiru'), __('% Responses','ambiru'));?> <?php _e('to','ambiru'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>

<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<ol id="comments" class="commentlist">
<?php wp_list_comments('type=comment&callback=list_comments'); ?>
</ol>


<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>
<br /><br />
<?php endif; ?>


<?php if ( ! empty($comments_by_type['pings']) ) : ?>

<h3><?php _e('Trackbacks/Pingbacks', 'ambiru'); ?></h3>
<ol class="pinglist">
<?php wp_list_comments('type=pings&callback=list_pings'); ?>
</ol>

<?php endif; ?>


<?php else : // this is displayed if there are no comments so far ?>


<?php if ('open' == $post->comment_status) : ?>
 <!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Sorry, the comment form is closed at this time.', 'ambiru'); ?></p>


<?php endif; ?>


<?php endif; ?>






<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3><?php comment_form_title(__('Leave a Reply', 'ambiru'), __('Leave a Reply to %s', 'ambiru') ); ?></h3>
<br />
<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be','ambiru'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in','ambiru'); ?></a> <?php _e('to post a comment.','ambiru'); ?></p>
<?php else : ?>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e('Logged in as','ambiru'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account','ambiru'); ?>"><?php _e('Logout','ambiru'); ?> &raquo;</a></p>

<?php else : ?> 

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Name','ambiru'); ?> <?php if ($req) _e('(required)','ambiru'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (will not be published)','ambiru'); ?> <?php if ($req) echo _e('(required)','ambiru'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website','ambiru'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:');?> <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment','ambiru'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>

<?php endif; ?>

<?php endif; // if you delete this the sky will fall on your head ?>
