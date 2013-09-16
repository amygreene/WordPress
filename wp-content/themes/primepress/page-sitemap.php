<?php /*

	Template Name: Sitemap

*/ ?>



<?php get_header(); ?>

	

	<div id="primary" class="page-template">

		

		<div class="entry" id="post-<?php the_ID(); ?>">

			

			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php bloginfo('name'); ?> Sitemap"><?php the_title(); ?></a></h1>

			

			<div class="entry-content">

				<h3><?php _e('Pages', 'primepress'); ?></h3>

				<ul>

					<?php wp_list_pages('title_li='); ?>

				</ul>

				

				<h3><?php _e('Posts', 'primepress'); ?></h3>

				<ul>

					<?php wp_get_archives('type=postbypost'); ?>

				</ul>

				

				<h3><?php _e('Categories', 'primepress'); ?></h3>

				<ul>

					<?php wp_list_categories('title_li='); ?>

				</ul>

				

				<h3><?php _e('Monthly Archives', 'primepress'); ?></h3>

				<ul>

					<?php wp_get_archives(); ?>

				</ul>

			</div>

			

		</div><!--.entry-->

		

	</div><!--#primary-->

	

<?php get_sidebar(); ?>



<?php get_footer(); ?>