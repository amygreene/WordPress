<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="postwrapper" id="post-<?php the_ID(); ?>">
			  <div class="title">
				<h2><?php the_title(); ?></h2>
			  </div>
			  <div class="page">
			
				<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>',TEMPLATE_DOMAIN)); ?>

				<ul class="buttons">
				  <li><?php edit_post_link(__('Edit this entry.',TEMPLATE_DOMAIN),'',''); ?></li>
				</ul>
				  <?php wp_link_pages('<p class="pages">'.__('Pages',TEMPLATE_DOMAIN).': ', '</p>', '', '', '', ''); ?>
			</div>
		</div>

		<?php if ( comments_open() ) comments_template('',true); ?>

	  <?php endwhile; endif; ?>
	
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>