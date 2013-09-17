<?php // Do not delete these lines
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

<?php if ( have_comments() ) : ?><?php if ( ! empty($comments_by_type['comment']) ) : ?>
<div class="title">
<h2><?php comments_number(__('No Comments',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN)); ?>  </h2>
</div>

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
   <div id="post-navigator-single">
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
		<p class="nocomments"><?php _e('Comments are closed.',TEMPLATE_DOMAIN);?><p>
		
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
             <div id="respond">
		<div class="title">
		  <h2><?php _e("Leave a response",TEMPLATE_DOMAIN); ?></h2>
		</div>
		<div class="post">

  <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
  <p><?php _e('You must be',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in',TEMPLATE_DOMAIN);?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN);?></p>
  </div>
 
  <?php else : ?>
  <form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">


     <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>


  
    <?php if ( $user_ID ) : ?>
    <p><?php _e('Logged in as',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN);?>"><?php _e('Logout',TEMPLATE_DOMAIN);?> &raquo;</a>
    </p>

    <?php else : ?>
    <p><label for="author"><?php _e("Name",TEMPLATE_DOMAIN); ?><span class="req">*</span></label><br>
    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"  class="field"/><br>
    <label for="email"><?php _e("Email",TEMPLATE_DOMAIN); ?><span class="req">*</span></label><br>
    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="field" /><br>
    <label for="url"><?php _e('Website',TEMPLATE_DOMAIN);?></label><br>
    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="field" /></p>

    <?php endif; ?>
  

  <div class="entry">


  <p><?php _e("Your response:",TEMPLATE_DOMAIN); ?><br>
  <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

  <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment',TEMPLATE_DOMAIN);?>" />
  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  </p>

<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

  </div>
  </form>
  </div>
   </div>
  <?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
