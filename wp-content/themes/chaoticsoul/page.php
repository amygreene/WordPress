<?php get_header(); ?>

	<div id="content" class="widecolumn">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="title"><?php the_title(); ?></h2>
			<div class="entrytext">
				<?php the_content('<p class="serif">'.__('Read the rest of this page &raquo;', 'chaoticsoul').'</p>'); ?>
				<?php link_pages('<p><strong>'.__('Pages:', 'chaoticsoul').'</strong> ', '</p>', 'number'); ?>
                <?php edit_post_link(__('Edit this entry.', 'chaoticsoul'), '<p>', '</p>'); ?>
			</div>
		</div>



       	<?php endwhile; ?>

   	<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>

    <?php else: ?>

      <?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>