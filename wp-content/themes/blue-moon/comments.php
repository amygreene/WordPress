<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'blue-moon'));
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
<p class="nocomments">
  <?php _e("This post is password protected. Enter the password to view comments.", 'blue-moon'); ?>
<p>
  <?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<div id="commentblock">

<?php if ( have_comments() ) : ?>


<?php if ( ! empty($comments_by_type['comment']) ) : ?>
<!--comments area-->
<h2 id="comments">
<?php comments_number(__('No Comment', 'blue-moon'), __('1 Comment so far', 'blue-moon'), __('% Comments so far', 'blue-moon')); ?>
</h2>


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
	<h3><?php _e('Trackbacks/Pingbacks', 'blue-moon'); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>

 <?php endif; ?>





<?php if ('open' == $post-> comment_status) : ?>

<div id="respond">
<div id="loading" style="display: none;"><?php ('Posting your comment.');?></div>
<div id="errors"></div>



<h2><?php _e('Leave a Reply', 'blue-moon');?></h2>


<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be','blue-moon'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in','blue-moon'); ?></a>
<?php _e('to post a comment.','blue-moon'); ?></p>
<?php endif;  ?>


<div id="commentsform">

<!--<form id="commentform" action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" onsubmit="new Ajax.Updater({success: 'commentlist'}, '<?php bloginfo('stylesheet_directory') ?>/comments-ajax.php', {asynchronous: true, evalScripts: true, insertion: Insertion.Bottom, onComplete: function(request){complete(request)}, onFailure: function(request){failure(request)}, onLoading: function(request){loading()}, parameters: Form.serialize(this)}); return false;">  -->

        <form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">


      <?php if ( $user_ID ) : ?>
      <p><?php _e('Logged in as','blue-moon'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','blue-moon'); ?>"><?php _e('Log out &raquo;','blue-moon'); ?></a></p>
       <?php endif;  ?>


       <?php if ( !$user_ID ) : ?>



      <p>
        <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
        <label for="author"><small>
        <?php _e('name', 'blue-moon');?>
        <?php if ($req) _e('(required)'); ?>
        </small></label>
      </p>
      <p>
        <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
        <label for="email"><small>
        <?php _e('email', 'blue-moon');?>
        (
        <?php _e('will not be shown', 'blue-moon');?>
        )
        <?php if ($req) _e('(required)'); ?>
        </small></label>
      </p>
      <p>
        <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
        <label for="url"><small>
        <?php _e('website', 'blue-moon');?>
        </small></label>
      </p>

          <?php endif; ?>



      <!--<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:');?> <?php echo allowed_tags(); ?></small></p>-->
      <p>
        <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
      </p>
      <p>
        <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'blue-moon');?>" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>


</div>

<?php endif; // If registration required and not logged in ?>

</div>
