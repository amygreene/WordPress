<?php get_header(); ?>

		<div id="content_box">
		
			<div id="content">
				

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<div class="navigation">
						<div class="previous"><?php previous_post_link('%link') ?></div>
						<div class="next"><?php next_post_link('%link') ?></div>
					</div>
				
					<div class="post" id="post-<?php the_ID(); ?>">
						<h4><?php the_time('l, F jS, Y') ?>...<?php the_time() ?></h4>
						<h2><?php the_title(); ?></h2>
				
						<div class="entry">
							<span class="jump"><a href="<?php the_permalink() ?>#comments"><?php _e('Jump to Comments',TEMPLATE_DOMAIN);?></a></span>


<?php the_content(); ?>

							<div class="post_meta">
							<p class="num_comments"><?php comments_popup_link(__('0 Comments', TEMPLATE_DOMAIN), __('1 Comment', TEMPLATE_DOMAIN), __('% Comments', TEMPLATE_DOMAIN)); ?></p>
							<p class="tagged"><?php _e("Posted by",TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?> <?php _e('Filed under', TEMPLATE_DOMAIN);?> <?php the_category(', ') ?></p>
						</div>

						</div>
					</div>

					<?php comments_template('',true); ?>
				
				<?php endwhile; else: ?>
				
					<p><?php _e('Sorry, no posts matched your criteria.', TEMPLATE_DOMAIN);?></p>
				
				<?php endif; ?>
			
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>

<?php get_footer(); ?>