<?php get_header();?>
	<div id="main">
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page">
		<div class="page-info"><h2 class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','connections');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php /*<?php _e('Posted by');?> <?php the_author(); ?>*/ ?><?php edit_post_link(__('(edit this)','connections')); ?></div>

			<div class="page-content">

				<?php the_content(); ?>
	
				<?php link_pages(__('<p><strong>Pages:</strong> '), '</p>', 'number'); ?>
	
			</div>
		</div>

	  <?php endwhile; ?>

              	<?php if ( comments_open() ) comments_template('',true); // Get wp-comments.php template ?>

      <?php endif; ?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer();?>
</div>
</div>
</body>
</html>