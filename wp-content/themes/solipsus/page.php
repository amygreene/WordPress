<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="page">

		<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>


<?php the_content(__("<p>Read the rest of this page &raquo;</p>",TEMPLATE_DOMAIN)); ?>

		<?php wp_link_pages(); ?>
		
		<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '<p>{ ', ' }</p>'); ?>
<?php if ( comments_open() ) comments_template('',true); // Get wp-comments.php template ?>
		</div>
	
	<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
