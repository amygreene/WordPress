<?php get_header(); ?>

<div id="content" class="subcontainer fleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			
			<div class="maindate fleft">
				 <?php the_time('d') ?>
				 <br />
				 <span><?php the_time('M') ?> </span>
			</div>
					
			<h1 class="maintitle fleft"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<br class="clear" />
			 	<br />

				<p>
				<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
				</p>
				
				<?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?>
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				<br />
				<p class="fleft"><?php previous_image_link() ?></p>
				<p class="fright"><?php next_image_link() ?></p>
				<div class="clear"></div>
				<br />
				
				<p><?php edit_post_link('Edit this entry.','',''); ?></p>	
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>
	<p>Sorry, no attachments matched your criteria.</p>

	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>