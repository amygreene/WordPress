<div class="post-header">
	
    <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    
    <?php if( is_sticky() ) { ?> <span class="sticky-post"><?php _e('Sticky post', 'baskerville'); ?></span> <?php } ?>
    
</div> <!-- /post-header -->

<?php if ( has_post_thumbnail() ) : ?>

		<div class="featured-media">
		
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			
				<?php the_post_thumbnail('post-thumbnail'); ?>
				
			</a>
					
		</div> <!-- /featured-media -->
			
	<?php endif; ?>
									                                    	    
<div class="post-excerpt">
	    		            			            	                                                                                           
	<?php 
	//test if is custom taxonomy or custom post type archive to display custom fields otherwise it's a standard post archive and gets the regular excerpt
	if  ( is_tax() || is_post_type_archive() )  {
		 echo the_meta(); 
		}
	else {
			the_excerpt('100');
	}
	
	?> 

</div> <!-- /post-excerpt -->

<div class="post-meta">

	<a class="post-date" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_time( 'Y/m/d' ); ?></a>
	
	<?php
	
		if( function_exists('zilla_likes') ) zilla_likes(); 
	
		if ( comments_open() ) {
			comments_popup_link( '0', '1', '%', 'post-comments' );
		}
		
		edit_post_link(); 
	
	?>

	<div class="clear"></div>

</div>
            
<div class="clear"></div>