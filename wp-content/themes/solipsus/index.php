<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">

				<h2 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<p class="postmeta">
				{ <?php the_time(get_option('date_format')) ?> @ <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_time() ?></a> }
				&#183;
				{ <?php the_category(', ') ?> }
				<br />
				{ <?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', ''); ?> }
				&#183;
				{ <?php comments_popup_link(__('No Comments',TEMPLATE_DOMAIN), __('Comments (1)',TEMPLATE_DOMAIN), __('Comments (%)',TEMPLATE_DOMAIN), 'commentslink', __('Comments off',TEMPLATE_DOMAIN)); ?> }
				</p>

				<div class="postentry">

<?php the_content("... continue reading this entry.",TEMPLATE_DOMAIN); ?><?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>



</div>

				<p class="postfeedback">
				<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '&nbsp; {', '}'); ?>
				</p>

			</div>
				
		<?php endwhile; ?>



		<?php posts_nav_link(' &#183; ', __('Next entries &raquo;',TEMPLATE_DOMAIN), __('&laquo; Previous entries',TEMPLATE_DOMAIN)); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found',TEMPLATE_DOMAIN); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.',TEMPLATE_DOMAIN); ?></p>

		<h3><?php _e('Search',TEMPLATE_DOMAIN); ?></h3>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
