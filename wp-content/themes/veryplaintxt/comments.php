<div class="comments">
<?php
	$req = get_settings('require_name_email'); // Checks if fields are required
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks!' );
	if ( ! empty($post->post_password) ) :
		if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
	<div class="nopassword"><?php _e('Enter the password to view comments to this post.', 'veryplaintxt') ?></div>
</div>
<?php
			return;
		endif;
	endif;
?>





<?php if ( have_comments() ) : ?>

<?php
global $veryplaintxt_comment_alt;
$veryplaintxt_comment_alt = 0; ?>

<h3 class="comment-header" id="numcomments"><?php comments_number(__('No Responses',TEMPLATE_DOMAIN), __('One Response',TEMPLATE_DOMAIN), __('% Responses' ,TEMPLATE_DOMAIN));?> <?php _e('to',TEMPLATE_DOMAIN);?>  &#8220;<?php the_title(); ?>&#8221;</b></h3>


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

    <ol id="pingbacks" class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>



      <?php endif; ?>




<?php if ( 'open' == $post->comment_status ) : ?>

<div id="respond">
	<h3 id="respond"><?php _e('Post a Comment', 'veryplaintxt') ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

	<div id="mustlogin"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'veryplaintxt'),
			get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></div>

<?php else : ?>

	<div class="formcontainer">

		<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
             <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( $user_ID ) : ?>

			<div id="loggedin"><?php printf(__('Logged in as <a href="%1$s" title="View your profile" class="fn">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'veryplaintxt'),
					get_option('siteurl') . '/wp-admin/profile.php',
					wp_specialchars($user_identity, true),
					get_option('siteurl') . '/wp-login.php?action=logout&amp;redirect_to=' . get_permalink() ) ?></div>

<?php else : ?>

			<div id="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'veryplaintxt') ?> <?php if ($req) _e('Required fields are marked <span class="req-field">*</span>', 'veryplaintxt') ?></div>

			<div class="form-label"><label for="author"><?php _e('Name', 'veryplaintxt') ?></label> <?php if ($req) _e('<span class="req-field">*</span>', 'veryplaintxt') ?></div>
			<div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>

			<div class="form-label"><label for="email"><?php _e('Email', 'veryplaintxt') ?></label> <?php if ($req) _e('<span class="req-field">*</span>', 'veryplaintxt') ?></div>
			<div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>

			<div class="form-label"><label for="url"><?php _e('Website', 'veryplaintxt') ?></label></div>
			<div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>

<?php endif ?>

			<div class="form-label"><label for="comment"><?php _e('Comment', 'veryplaintxt') ?></label></div>
			<div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>

			<div class="form-submit"><input id="submit" name="submit" type="submit" value="<?php _e('Submit comment', 'veryplaintxt') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>


<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>


		</form>
	</div>

   <?php endif ?>

    </div>

<?php endif ?>

</div>