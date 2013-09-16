<?php get_header(); ?>
<div id="content" class="subcontainer fleft">
	<div class="breadcrumb">
		<?php kreative_breadcrumb(); ?>
 	</div>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="mainhead"><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
			</div>
		</div>
	
	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>