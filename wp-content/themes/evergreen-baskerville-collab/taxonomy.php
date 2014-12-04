<?php get_header(); ?>

<div class="wrapper section medium-padding">

	<div class="page-title section-inner">
		
		

			<h5><?php $the_tax = get_taxonomy( get_query_var( 'taxonomy' ) );
			echo $the_tax->labels->name; ?></h5>
			
			<h3><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h3>
			

		
		<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) )
				echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
		?>
		
	</div> <!-- /page-title -->
	
	<div class="content section-inner">
	
		<?php if ( have_posts() ) : ?>
	
			<div class="posts">
			
				<?php rewind_posts(); ?>
				
				<?php $posts = query_posts($query_string . '&orderby=title&order=asc'); ?>
			
				<?php while ( have_posts() ) : the_post(); ?>
				
					<div class="post-container">
						
				
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
							<?php get_template_part( 'content', get_post_format() ); ?>
							
							<div class="clear"></div>
							
						</div> <!-- /post -->
					
					</div>
					
				<?php endwhile; ?>
							
			</div> <!-- /posts -->
						
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			
				<div class="archive-nav">
				
					<?php echo get_next_posts_link( '&laquo; ' . __('Older posts', 'baskerville')); ?>
						
					<?php echo get_previous_posts_link( __('Newer posts', 'baskerville') . ' &raquo;'); ?>
					
					<div class="clear"></div>
					
				</div> <!-- /post-nav archive-nav -->
				
				<div class="clear"></div>
				
			<?php endif; ?>
					
		<?php endif; ?>
	
	</div> <!-- /content -->

</div> <!-- /wrapper -->

<?php get_footer(); ?>