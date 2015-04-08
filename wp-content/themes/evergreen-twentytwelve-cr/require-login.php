<?php
/**
* Template Name: Require Login
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
 */
//require authentication and then redirect back to originating page
auth_redirect();

 //page template begins

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>