<?php get_header(); ?>

  <div id="main_content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry clearfix">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
                <div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>','tropicala')); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

				<p class="postmetadata alt">
					<small>
						<?php _e('This entry was posted on','tropicala'); ?> <?php the_time('l, F jS, Y') ?> <?php _e('at','tropicala'); ?> <?php the_time() ?>
						<?php _e('and is filed under','tropicala'); ?> <?php the_category(', ') ?>.
						<?php the_taxonomies(); ?>
						<?php _e('You can follow any responses to this entry through the','tropicala'); ?> <?php post_comments_feed_link('RSS 2.0'); ?>
                        <?php _e('feed','tropicala'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
			<?php _e('You can'); ?> <a href="#respond"><?php _e('leave a response','tropicala'); ?></a>, <?php _e('or','tropicala'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','tropicala'); ?></a> <?php _e('from your own site','tropicala'); ?>.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
		<?php _e('Responses are currently closed, but you can','tropicala'); ?> <a href="<?php trackback_url(); ?> " rel="trackback">
        <?php _e('trackback','tropicala'); ?></a> <?php _e('from your own site','tropicala'); ?>.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','tropicala'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','tropicala'); ?>

						<?php } edit_post_link(__('Edit this entry.','tropicala'),'',''); ?>

					</small>
				</p>

			</div>

		</div>

	<?php //comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no attachments matched your criteria.','tropicala'); ?></p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
