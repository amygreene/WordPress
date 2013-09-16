<?php get_header(); ?>

		<div id="content_box">
		
			<div id="content">


			
				<?php if (have_posts()) : ?>
					
					<?php while (have_posts()) : the_post(); ?>
							
						<div class="post">
						<h4><?php the_time('l, F jS, Y') ?></h4>
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

						<div class="entry">

<?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content( __('<p>Click here to read more</p>',TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>

						</div>

						<div class="post_meta">
							<p class="num_comments"><?php comments_popup_link(__('0 Comments', TEMPLATE_DOMAIN), __('1 Comment', TEMPLATE_DOMAIN), __('% Comments', TEMPLATE_DOMAIN)); ?></p>
							<p class="tagged"><?php _e("Posted by",TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?> <?php _e('Filed under', TEMPLATE_DOMAIN);?> <?php the_category(', ') ?></p>
						</div>
					</div>

				
					<?php endwhile; ?>
					
				<?php else : ?>
			
					<h2 class="center"><?php _e('Not Found',TEMPLATE_DOMAIN);?></h2>
					<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN);?></p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			
				<?php endif; ?>
			
			<p align="center"><?php posts_nav_link() ?></p>	
			</div>

			<?php get_sidebar(); ?>
		
		</div>

<?php get_footer(); ?>