
<div id="extra-content">
	
	<div class="widget-block-wide">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Block Wide') ) : ?>

			<div id="latest-post" class="widget widget_text">
			<h3><?php _e("Most Recent Post",TEMPLATE_DOMAIN); ?></h3>
			<?php
				$posts = get_posts("numberposts=1");
				foreach($posts as $post) : setup_postdata($post);
			?>
				<strong><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong>
				<?php the_excerpt(); ?>
			<?php
				endforeach;
			?>
			</div>
			
		<?php endif; ?>
	</div>

	<div class="widget-block">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Block 1') ) : ?>
			
			<div id="recent-posts" class="widget widget_recent_entries">
			<h3><?php _e("Recent Posts",TEMPLATE_DOMAIN); ?></h3>
				<ul>
					<?php wp_get_archives('type=postbypost&limit=10'); ?>
				</ul>
			</div>				
			
		<?php endif; ?>
	</div>

	<div class="widget-block">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Block 2') ) : ?>

			<div id="archives" class="widget widget_archives">
			<h3><?php _e('Archives',TEMPLATE_DOMAIN);?></h3>
				<ul>
					<?php wp_get_archives('limit=12'); ?>
				</ul>
			</div>
			
		<?php endif; ?>
	</div>

	<div class="widget-block">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Widget Block 3') ) : ?>

			<div id="categories" class="widget widget_categories">
			<h3><?php _e('Categories');?></h3>	
				<ul>
					<?php wp_list_cats('show_count=1'); ?>
				</ul>
			</div>
			
		<?php endif; ?>
	</div>

	<span class="clearer"></span>

</div>

<div id="credits">
	
	<p id="site-information">
		<strong><?php _e('Content',TEMPLATE_DOMAIN);?> &copy; <?php bloginfo('name'); ?></strong><br/>
		<?php _e('Proudly Powered by',TEMPLATE_DOMAIN);?> <a href="http://wordpressmu.org/">WordPress MU</a><br/>
		Theme <?php _e('designed by',TEMPLATE_DOMAIN);?> <a href="http://thedesigncanopy.com/">The Design Canopy</a><br />
		<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
	</p>
	<p id="rss-feeds">
		<a class="rss-entries" href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)',TEMPLATE_DOMAIN);?></a><br/>
		<a class="rss-comments" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)',TEMPLATE_DOMAIN);?></a>
	</p>
	<p id="site-run-stats">
		<?php echo get_num_queries(); ?> <?php _e('queries',TEMPLATE_DOMAIN);?>.<br/>
		<?php timer_stop(1); ?> <?php _e('seconds',TEMPLATE_DOMAIN);?>.
	</p>
	<span class="clearer"></span>
     <?php wp_footer(); ?>   
</div>



</body>
</html>
