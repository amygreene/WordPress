<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
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


 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php elseif (!is_page()) : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e("Comments are closed.",TEMPLATE_DOMAIN); ?></p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
                  <div id="respond">
		<div id="comment-form">
				<h3 class="formhead"><?php _e("Have your say",TEMPLATE_DOMAIN); ?></h3>
				<p><small><strong>XHTML:</strong> <?php _e("You can use these tags:",TEMPLATE_DOMAIN); ?> <?php echo allowed_tags(); ?></small></p>
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p><?php _e("You must be",TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e("logged in",TEMPLATE_DOMAIN); ?></a> <?php _e("to post a comment.",TEMPLATE_DOMAIN); ?></p>
				<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

				<?php if ( $user_ID ) : ?>
				<p><?php _e("Logged in as",TEMPLATE_DOMAIN); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e("Log out of this account",TEMPLATE_DOMAIN); ?>"><?php _e("Logout &raquo;",TEMPLATE_DOMAIN); ?></a></p>
				<?php else : ?>
				
				<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="textfield" tabindex="1" /><label class="text"><?php _e("Name",TEMPLATE_DOMAIN); ?><?php if ($req) echo " (required)"; ?></label><br />
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="textfield" tabindex="2" /><label class="text"><?php _e("Email",TEMPLATE_DOMAIN); ?><?php if ($req) echo " (required)"; ?></label><br />
				<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="textfield" tabindex="3" /><label class="text"><?php _e("Website",TEMPLATE_DOMAIN); ?></label><br />
				
				<?php endif; ?>
				
				<textarea name="comment" id="comment" class="commentbox" tabindex="4"></textarea>
				<div class="formactions">
					<span style="visibility:hidden"><?php _e("Safari hates me",TEMPLATE_DOMAIN); ?></span>
					<input style="margin-top: 10px;" type="submit" name="submit" tabindex="5" class="submit" value="<?php _e("Add your comment",TEMPLATE_DOMAIN); ?>" />
				</div>
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

				</form>
			</div>
           </div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
