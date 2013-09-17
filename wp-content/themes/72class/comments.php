<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die (__('Please do not load this page directly. Thanks!', '72class'));

if (!empty($post->post_password)) { // if there's a password
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', '72class');?><p>

<?php
return;
}
}

/* This variable is for alternating comment background */
$oddcomment ='alt';
?>

<!---------------- start comments ---------------->

<!-- open comments --><div class="comments-wrapper">
<!-- open content --><div class="comments">

<?php if ( have_comments() ) : ?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?>



<h3 id="comments">
<?php comments_number(__('No comments <span>so far</span>', '72class'), __('1 comment <span>so far</span>', '72class'), __('% comments <span>so far</span>', '72class')); ?>
</h3>

<div class="metalinks">
<span class="commentsrsslink">
<small><?php comments_rss_link(__('Feed for this Entry', '72class')); ?></small>
</span>
<?php if ('open' == $post->ping_status) { ?>
<span class="trackbacklink">
<small>
<a href="<?php trackback_url(); ?>" title="<?php _e('Copy this URI to trackback this entry.', '72class'); ?>">
<?php _e('Trackback Address', '72class'); ?></a>
</small>
</span>
<?php } ?>
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


 <?php if ( ! empty($comments_by_type['pings']) ) : ?>
 <div class="entry">
	<h3><?php _e('Trackbacks/Pingbacks', '72class'); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>


<?php else : // this is displayed if there are no comments so far ?>


<?php if ('open' == $post->comment_status) : ?>
 <!-- If comments are open, but there are no comments. -->
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<?php endif; ?>


<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>


<div id="respond">

<h3><?php comment_form_title(__('Leave a Reply', '72class'), __('Leave a Reply to %s', '72class') ); ?></h3>
<br /><?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?>
<p><small><strong>XHTML:</strong> <?php _e('You can use these tags:', '72class');?> <?php echo allowed_tags(); ?></small></p>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

<p><?php _e('You must be');?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in');?></a> <?php _e('to post a comment.');?></p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<!-- open comment form --><div class="comment_form">

<?php if ( $user_ID ) : ?>

<p><?php _e('Logged in as', '72class');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', '72class');?>"><?php _e('Logout', '72class');?> &raquo;</a></p>

<?php else : ?>

<fieldset>
<legend><?php _e('Your Details', '72class');?></legend>
<label for="author"><?php _e('Enter your full name ', '72class');?> <?php if ($req) echo "__('(required)', '72class')"; ?><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="35" maxlength="40" tabindex="1" class="med" />
</label>
<br />
<label for="email"><?php _e('Mail (will not be published)', '72class');?> <?php if ($req) echo "__('(required)', '72class')"; ?><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="35" maxlength="40" tabindex="2" class="med"  />
</label>
<br />
<label for="url"><?php _e('Website', '72class');?><br />
<input type="text" name="url" id="url"  value="<?php echo $comment_author_url; ?>" size="35" maxlength="40" tabindex="3" class="med"  />
</label>
</fieldset>

<?php endif; ?>


<fieldset>
<legend><?php _e('Your Comment', '72class');?></legend>
<label for="author"><span class="off"><?php _e('Author');?></span><br />
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" class="textbox"></textarea>
</label>
<br />
<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', '72class');?>" class="submit-button" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>
</fieldset>

<!-- close comment_form--></div>

</form>

<?php endif; ?>

<!-- close respond --></div>

<?php endif; ?>




<!-- close comments-wrapper -->
</div>
</div>