<?php get_header(); ?>

	<div id="primary" class="single-post">
	<div class="inside">
		<div class="primary">

	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>
		
		<ul class="dates">
		 	<?php while (have_posts()) : the_post(); ?>
			<li>
				<span class="date"><?php the_time('n.j.y') ?></span>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
				 <?php _e("posted in",TEMPLATE_DOMAIN); ?>
				<?php the_category(', ') ?>  
				<?php if (is_callable('the_tags')) the_tags(__('tagged ',TEMPLATE_DOMAIN), ', '); ?>
			</li>
			<?php $results++; ?>
			<?php endwhile; ?>
		</ul>

		<div class="navigation">
			<div class="left"><?php next_posts_link(__('&laquo; Previous Entries',TEMPLATE_DOMAIN)) ?></div>
			<div class="right"><?php previous_posts_link(__('Next Entries &raquo;',TEMPLATE_DOMAIN)) ?></div>
		</div>

	<?php else : ?>

		<h1><?php _e("No posts found. Try a different search?",TEMPLATE_DOMAIN); ?></h1>

	<?php endif; ?>

	</div>
	
	<div class="secondary">
		<h2><?php _e("Search",TEMPLATE_DOMAIN); ?></h2>
		<div class="featured">
			<p><?php _e("You searched for &ldquo;",TEMPLATE_DOMAIN); ?> <?php echo wp_specialchars($s, 1); ?>&rdquo; <?php _e("at",TEMPLATE_DOMAIN); ?> <?php bloginfo('name'); ?>. <?php _e("There were",TEMPLATE_DOMAIN); ?>
			<?php
				if (!$results) echo __("no results, better luck next time.",TEMPLATE_DOMAIN);
				elseif (1 == $results) echo __("one result found. It must be your lucky day.",TEMPLATE_DOMAIN);
				else echo $results . __(" results found.",TEMPLATE_DOMAIN);
			?>
			</p>
			
		</div>
	</div>
	<div class="clear"></div>
	</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
