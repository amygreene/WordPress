<?php get_header(); ?>

	<div id="primary">
	<div class="inside">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>',TEMPLATE_DOMAIN)); ?>
	
		<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		<br class="clear" />
		<?php edit_post_link(__('Edit this entry.',TEMPLATE_DOMAIN), '<p>', '</p>'); ?>

	<?php endwhile; endif; ?>
	</div>
	</div>

	<hr class="hide" />
	<div id="secondary">
		<div class="inside">
			
			<?php if ('open' == $post-> comment_status) {
				// Comments are open ?>
				<div class="comment-head">
					<h2><?php comments_number(__('0 Comments',TEMPLATE_DOMAIN), __('One Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN)); ?></h2>
					<span class="details"><a href="#comment-form"><?php _e("Jump to comment form",TEMPLATE_DOMAIN); ?></a> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e("trackback uri",TEMPLATE_DOMAIN); ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>

                <?php comments_template('',true); ?>

			<?php } elseif ('open' != $post-> comment_status) { ?>
			<?php } ?>
			

	</div>
	</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
