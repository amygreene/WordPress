<?php // Do not delete these lines

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

		die (__('Please do not load this page directly. Thanks!', 'emptiness'));



	if (!empty($post->post_password)) { // if there's a password

		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

			?>



			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'emptiness'); ?></p>



			<?php

			return;

		}

	}

?>



          <?php if ('open' == $post->comment_status && 'closed' != get_option('default_comment_status')) : ?>





              <div class="item" id="comments"></div>

                <?php if ( have_comments() ) : ?>

                   <?php if ( ! empty($comments_by_type['comment']) ) : ?>

              <?php wp_list_comments(array('style' => 'div', 'type' => 'all', 'callback' => 'mytheme_comment', 'post' => $post)); ?>

                     <?php endif; ?>

                         <?php endif; ?>
            <div id="respond" class="item">

              <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

                <div class="side left">

                  <?php if ( $user_ID ) : ?>

                    <?php _e('logged in as', 'emptiness'); ?><br/>

                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a><br/>

                    <?php if (function_exists('wp_logout_url')) { ?>

	                    <a href="<?php echo wp_logout_url(); ?>"><?php _e('log out', 'emptiness'); ?></a><br/>

	                <?php } else { ?>

	                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout"><?php _e('log out', 'emptiness'); ?></a><br/>

                    <?php } ?>

                  <?php else : ?>

                    <?php _e('*name', 'emptiness'); ?><br/>

                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="17" tabindex="1" /><br/>

                    <?php _e('*e-mail', 'emptiness'); ?><br/>

                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="17" tabindex="2" /><br/>

                    <?php _e('web site', 'emptiness'); ?><br/>

                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="17" tabindex="3" /><br/>

                  <?php endif; ?>

                </div>

                <div class="main">

                  <?php comment_form_title( __('leave a comment', 'emptiness'), __('leave a reply to %s', 'emptiness') ); ?><br/>

                  <div id="cancel-comment-reply"><?php cancel_comment_reply_link( __('cancel reply', 'emptiness') ) ?></div>

                  <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea><br/>

                  <input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit', 'emptiness'); ?>" /><br/>

                <?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

                </div>

              </form>

            </div>

          <?php endif; ?>