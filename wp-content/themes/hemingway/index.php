<?php get_header(); ?>


	<div id="primary" class="twocol-stories">
		<div class="inside">
			<?php
				// Here is the call to only make two posts show up on the homepage REGARDLESS of your options in the control panel
				query_posts('showposts=2');
			?>
			<?php if (have_posts()) : ?>
				<?php $first = true; ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if($count < 2) { ?>
					<?php $count++; ?>
<div class="story<?php if($first == true) echo " first" ?>">
<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to",TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h3>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt() ?>

						<div class="details">
							<?php _e("Posted by",TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?> <?php _e("at",TEMPLATE_DOMAIN); ?> <?php the_time('ga \o\n n/j/y') ?> | <?php comments_popup_link(__('no comments;',TEMPLATE_DOMAIN), __('1 comment',TEMPLATE_DOMAIN), __('% comments',TEMPLATE_DOMAIN)); ?> | <?php _e("Filed Under:",TEMPLATE_DOMAIN); ?> <?php the_category(', ') ?> | <?php if (is_callable('the_tags')) the_tags(__('Tagged: ',TEMPLATE_DOMAIN), ', ', ' | '); ?> <span class="read-on"><a href="<?php the_permalink() ?>"><?php _e("read on",TEMPLATE_DOMAIN); ?></a><br /><?php edit_post_link(__('edit',TEMPLATE_DOMAIN)); ?></span>
						</div>
					</div>
					<?php $first = false; ?>
					<?php } ?>
				<?php endwhile; ?>
		</div>

			<?php else : ?>
		
				<h2 class="center"><?php _e("Not Found",TEMPLATE_DOMAIN); ?></h2>
				<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		
			<?php endif; ?>
				
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #primary -->



<?php get_sidebar(); ?>

<?php get_footer(); ?>
