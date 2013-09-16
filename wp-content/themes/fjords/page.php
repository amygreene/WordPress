<?php get_header(); ?>
	<div id="pagina">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2 class="pagina-titulo" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>

		<?php the_content(__('Read the rest of this page &raquo;',TEMPLATE_DOMAIN)); ?>
		<?php wp_link_pages(); ?>
		
		<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '<p>', '</p>'); ?>
	
	<?php endwhile; endif; ?>
	</div>
	<?php if ( comments_open() ) comments_template('',true); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
