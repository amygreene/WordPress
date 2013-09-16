<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('This page is password protected. Enter your password to continue!', 'minimalist'); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>

<div class="commentheader">Comments</div>

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
 <h3><?php _e('Trackbacks/Pingbacks', 'minimalist'); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>


<?php endif; ?>

<?php if ($post->comment_status == "open") : ?>
<div id="respond">
<div class="navigation"><?php _e('Write a comment', 'minimalist'); ?></div>

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if (get_option('comment_registration') && !$user_ID) : ?>

<p><?php _e('You must be', 'minimalist');?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('logged in', 'minimalist');?></a> <?php _e('to post a comment.', 'minimalist');?></p>



<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ($user_ID) : ?>

<p><?php _e('Logged in as', 'minimalist');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'minimalist');?>"><?php _e('Logout', 'minimalist');?> &raquo;</a></p>

<?php else : ?>
<label for="author"><?php _e('Name:', 'minimalist'); ?></label><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><br/><br/>
<label for="email"><?php _e('E-mail:', 'minimalist'); ?></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><br/><br/>
<label for="url"><?php _e('URL:', 'minimalist'); ?></label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><br/><br/>

<?php endif; ?>
<label for="comment"><?php _e('Message:', 'minimalist'); ?></label><br />
<textarea name="comment" id="comment" cols="45" rows="4" tabindex="4"></textarea><br/><br/>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="submit" name="submit" value="<?php _e('Submit!', 'minimalist'); ?>" class="button" tabindex="5" />


<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>


</form>
</div>

<?php endif; ?>

<?php endif; ?>

