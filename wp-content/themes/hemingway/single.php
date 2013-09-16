<?php get_header(); ?>

	<div id="primary" class="single-post">
		<div class="inside">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="primary">
				<h1><?php the_title(); ?></h1>
				<?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>',TEMPLATE_DOMAIN)); ?>
				<?php wp_link_pages(); ?>
			</div>
			<hr class="hide" />
			<div class="secondary">
				<h2><?php _e("About this entry",TEMPLATE_DOMAIN); ?></h2>
				<div class="featured">
					<p><?php _e("You&rsquo;re currently reading &ldquo;",TEMPLATE_DOMAIN); ?><?php the_title(); ?>,&rdquo; <?php _e("an entry on",TEMPLATE_DOMAIN); ?> <?php bloginfo('name'); ?></p>
					<dl>
						<dt><?php _e("Published:",TEMPLATE_DOMAIN); ?></dt>
						<dd><?php the_time('n.j.y') ?> / <?php the_time('ga') ?></dd>
					</dl>
					<dl>
						<dt><?php _e("Category:",TEMPLATE_DOMAIN); ?></dt>
						<dd><?php the_category(', ') ?></dd>
					</dl>
					<?php if (is_callable('the_tags')) : ?>
					<dl>
						<dt><?php _e("Tags:",TEMPLATE_DOMAIN); ?></dt>
						<dd><?php the_tags(''); ?></dd>
					</dl>
					<?php endif; ?>
					<?php edit_post_link(__('Edit this entry.', TEMPLATE_DOMAIN), '<dl><dt>Edit:</dt><dd> ', '</dd></dl>'); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #primary -->
	
	<hr class="hide" />
	<div id="secondary">
		<div class="inside">
			
			<?php if ('open' == $post-> comment_status) {
				// Comments are open ?>
				<div class="comment-head">
					<h2><?php comments_number(__('0 Comments',TEMPLATE_DOMAIN), __('One Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN)); ?></h2>
					<span class="details"><a href="#comment-form"><?php _e("Jump to comment form",TEMPLATE_DOMAIN); ?></a> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>"><?php _e("trackback uri",TEMPLATE_DOMAIN); ?></a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>
			<?php } elseif ('open' != $post-> comment_status) {
				// Neither Comments, nor Pings are open ?>
				<div class="comment-head">
					<h2><?php _e("Comments are closed",TEMPLATE_DOMAIN); ?></h2>
					<span class="details"><?php _e("Comments are currently closed on this entry.",TEMPLATE_DOMAIN); ?></span>
				</div>	
			<?php } ?>

			<?php comments_template('',true); ?>

			<?php endwhile; else: ?>
			<p><?php _e("Sorry, no posts matched your criteria.",TEMPLATE_DOMAIN); ?></p>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
