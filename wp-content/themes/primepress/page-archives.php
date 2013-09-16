<?php /*

	Template Name: Archives

*/ ?>



<?php get_header(); ?>

	

	<div id="primary" class="page-template">

		

		<div class="entry" id="post-<?php the_ID(); ?>">

			

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php bloginfo('name'); ?> Archives"><?php the_title(); ?></a></h1>

			

			<div class="entry-content">

				<p><?php _e('The following is the list of archives organized by time and category.', 'primepress'); ?></p>

				<h2><?php _e('Category Archives', 'primepress') ?></h2>

				<ul class="archives-list">

					<?php wp_list_categories('title_li=&show_count=1'); ?>

				</ul>

				<h2><?php _e('Monthly Archives', 'primepress') ?></h2>

				<ul class="archives-list">

					<?php wp_get_archives('show_post_count=1'); ?>

				</ul>

				

				<?php if ( function_exists('wp_tag_cloud') ) : ?>

					<h2><?php _e('Tag Archives', 'primepress'); ?></h2>

					<ul>

						<?php wp_tag_cloud('smallest=8&largest=22'); ?>

					</ul>

				<?php endif; ?>

			</div>

			

		</div><!--.entry-->

		

	</div><!--#primary-->

	

<?php get_sidebar(); ?>



<?php get_footer(); ?>