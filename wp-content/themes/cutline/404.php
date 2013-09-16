<?php get_header(); ?>

	<div id="content_box">
	
		<div id="content" class="pages">
			<h2><?php _e('Easy, tiger. This is a 404 page.','cutline'); ?></h2>
			<div class="entry">
				<p>Y<?php _e("ou are <em>totally</em> in the wrong place. Do not pass GO; do not collect $200. This is an error page. You might have stumbled here by accident or the post you are looking for is no longer here.",'cutline'); ?></p>
				<p><?php _e('Please, try one of the following:','cutline'); ?></p>
				<ul>
					<li><?php _e('Hit the "back" button on your browser.','cutline'); ?></li>
					<li><?php _e('Head on over to the','cutline'); ?> <a href="<?php bloginfo('url'); ?>"><?php _e('front page','cutline'); ?></a>.</li>
					<li><?php _e('Try searching using the form in the sidebar.','cutline'); ?></li>
					<li><?php _e('Click on a link in the sidebar.','cutline'); ?></li>
					<li><?php _e('Use the navigation menu at the top of the page.','cutline'); ?></li>
				</ul>
			</div>
		</div>

		<?php get_sidebar(); ?>
		
	</div>

<?php get_footer(); ?>