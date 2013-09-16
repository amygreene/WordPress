<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'bluebird'));

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments.", 'bluebird'); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<div id="comment">
	<br>
<?php if ( have_comments() ) : ?><?php if ( ! empty($comments_by_type['comment']) ) : ?>

	<p><?php comments_number(__('No Responses', 'bluebird'), __('One Response', 'bluebird'), __('% Responses', 'bluebird') );?> <?php _e('to', 'bluebird');?>  &#8220;<?php the_title(); ?>&#8221;</p>



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


 <?php if ( ! empty($comments_by_type['pings']) ) : ?>
 <div class="entry">
	<h3><?php _e('Trackbacks/Pingbacks', 'bluebird'); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>


 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		
		
	<?php endif; ?>
<?php endif; ?>

<div class="entry">
<p>
<?php if ($post->ping_status == "open") { ?>
	<a href="<?php trackback_url(display); ?>"><?php _e('Trackback URI', 'bluebird'); ?></a>  |
<?php } ?>
<?php if ($post-> comment_status == "open") {?>
	<?php comments_rss_link(__('Comments RSS', 'bluebird')); ?>
<?php }; ?>
<?php if ($post-> comment_status == "closed") {?>
	<?php _e('Comments are closed.', 'bluebird'); ?>
<?php }; ?>
</p>
</div>

<?php if ('open' == $post-> comment_status) : ?>

<div id="respond">

<p><?php _e('Leave a Reply', 'bluebird');?></p>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>
<?php _e('You must be', 'bluebird');?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in', 'bluebird');?></a> <?php _e('to post a comment.', 'bluebird');?></p>
</div>
<?php else : ?>

<div id="commentsform">
    <form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      
      <p><?php _e('Logged in as', 'bluebird');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'bluebird') ?>"> <?php _e('Logout &raquo;', 'bluebird'); ?> </a> </p>
      <?php else : ?>
      
      <p><?php _e('Name ', 'bluebird');?><?php if ($req) _e('(required)', 'bluebird'); ?><br />
      <input type="text" name="author" id="s1" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
      </p>
      
      <p><?php _e('Email ', 'bluebird');?><?php if ($req) _e('(required)', 'bluebird'); ?><br />
      <input type="text" name="email" id="s2" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
      </p>
      
      <p><?php _e('Website', 'bluebird');?><br />
      <input type="text" name="url" id="s3" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
      </p>
      
      <?php endif; ?>
      <!--<p>XHTML:</strong> <?php _e('You can use these tags:');?> <?php echo allowed_tags(); ?></p>-->
      <p><?php _e('Speak your mind', 'bluebird');?><br />
      <textarea name="comment" id="s4" cols="90" rows="10" tabindex="4"></textarea>
      </p>
      
      <p>
        <input name="submit" type="submit" id="hbutt" tabindex="5" value="<?php _e('Submit Comment', 'bluebird');?>" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>

<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>
    </form></div>
          </div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>

<!-- end comment -->