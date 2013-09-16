<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<div id="intro">
			<h1><?php _e('Search Results',TEMPLATE_DOMAIN);?></h1>
		</div>

		<div id="primary">
		<?php while (have_posts()) : the_post(); ?>
			<div class="post-brief">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<p class="post-metadata"><?php the_time(__('F jS, Y')) ?> <?php _e('in');?> <?php the_category(', ', '' ); ?> | <?php comments_popup_link(__('No comments',TEMPLATE_DOMAIN), __('1 comment',TEMPLATE_DOMAIN), __('% comments',TEMPLATE_DOMAIN), '', __('Comments closed',TEMPLATE_DOMAIN)); ?></p>
				<p class="excerpt"><?php the_excerpt() ?></p>
			</div>
		<?php endwhile; ?>
		</div>

		<div id="secondary">
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		</div>
<?php else : ?>
		<div id="intro">
			<h1><?php _e('Not Found',TEMPLATE_DOMAIN);?></h1>
		</div>

		<div id="primary">
			<p><?php _e("Sorry, there were no results returned for the terms you searched for. Please try a new search.",TEMPLATE_DOMAIN); ?></p>
		</div>

		<div id="secondary">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
<?php endif; ?>
<?php get_footer(); ?>