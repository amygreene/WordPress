<?php
/*
Template Name: Full Width Page
*/
?>
<?php get_header(); ?>
	<div id="main" class="full-width">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
		<div class="post full-width">
			<h1><?php the_title(); ?></h1>		
			<div class="postcontent">
				<?php the_content(); ?>
			</div><!-- /Postcontent -->
		</div><!-- /Post -->
		<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
		<?php endif; ?>	
	</div><!-- End Main -->			
<?php get_footer(); ?>