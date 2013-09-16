<div id="sidebar">
	<ul class="sidebar_list">

      <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("160x600-cutline-sidebar"); } ?>

		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>

          <li class="widget">
			<h2><?php _e('Search It!','cutline'); ?></h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>


         <li class="widget">
			<h2><?php _e('Categories','cutline'); ?></h2>
            <ul>
		    <?php wp_list_categories( 'orderby=name&hide_empty=1&hierarchical=true&title_li=&depth=1' ); ?>
            </ul>
		</li>


		<li class="widget">
			<h2><?php _e('Recent Entries','cutline'); ?></h2>
			<ul>
				<?php query_posts('showposts=10'); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><span class="recent_date"><?php the_time('n.j') ?></span></li>
				<?php endwhile; endif; ?>
				<li><a href="<?php bloginfo('url'); ?>/archives" title="Visit the archives!"><?php _e('Visit the archives for more!','cutline'); ?></a></li>
			</ul>
		</li>
		<?php if (function_exists('get_flickrrss')) { ?>
		<li class="widget">
			<h2><span class="flickr_blue">Flick</span><span class="flickr_pink">r</span></h2>
			<ul class="flickr_stream">
				<?php get_flickrrss(); ?>
			</ul>
		</li>
		<?php } ?>
		<?php get_links_list('id'); ?>
		<?php endif; ?>
	</ul>
</div>