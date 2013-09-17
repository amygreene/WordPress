<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="pagepost">
		<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
			<div class="entrytext"><?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280ink"); } ?>
				<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>','black-letterhead')); ?>
	<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280ink"); } ?>
				<?php link_pages('<p><strong>'.__('Pages:').'</strong> ', '</p>', 'number'); ?>
	            	<?php edit_post_link(__('Edit this entry.','black-letterhead'), '<p>', '</p>'); ?>  
			</div>
		</div>
	  <?php endwhile; ?>
              <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
      <?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>