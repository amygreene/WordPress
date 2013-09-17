<?php get_header(); ?>

	<div id="content_box">
	
		<div id="content" class="pages">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><?php the_title(); ?></h2>	
				<div class="entry">		
					<?php the_content(__('<p>Read the rest of this page &rarr;</p>','cutline')); ?>
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
				<?php if ('open' == $post-> comment_status) { ?>
				<p class="tagged"><a href="<?php the_permalink() ?>#comments"><?php comments_number(__('No Comments','cutline'), __('1 Comment','cutline'), __('% Comments','cutline') ); ?></a></p>
				<div class="clear"></div>
				<?php } else { ?>
				<div class="clear rule"></div>
				<?php } ?>
			</div>
			
			<?php endwhile; endif; ?>
			
			<?php if ('open' == $post-> comment_status) { comments_template(); } ?>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>