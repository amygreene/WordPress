<?php get_header(); ?>

	<div id="content_box">
	
		<div id="content" class="posts">
          	<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("cutline-top"); } ?>  
		<?php if (have_posts()) : ?>
			
			<?php while (have_posts()) : the_post(); ?>


                   <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','cutline'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<h4><?php the_time('F jS, Y') ?><!-- by <?php the_author() ?> --> &middot; <?php comments_popup_link(__('No Comments','cutline'), __('1 Comment','cutline'), __('% Comments','cutline') ); ?> &middot; <?php the_category(', ') ?> <?php edit_post_link(__('Edit','cutline'), ' &middot; ', ''); ?></h4>
				<div class="entry">

            		<?php the_content(__('[Read more &rarr;]','cutline')); ?>

				</div>
				<p class="tagged"><strong><?php _e('Tags:','cutline'); ?></strong><?php the_tags('','&middot;','');?></p>
<div class="clear"></div>
			</div>

			
			<?php endwhile; ?>
			
			<?php include (TEMPLATEPATH . '/navigation.php'); ?>
			
		<?php else : ?>
	
			<h2 class="page_header center"><?php _e('Not Found','cutline'); ?></h2>
			<div class="entry">
				<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'cutline'); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
	
		<?php endif; ?>
		
		</div>

		<?php get_sidebar(); ?>
	
	</div>

<?php get_footer(); ?>