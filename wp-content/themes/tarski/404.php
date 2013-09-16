<?php get_header(); ?>
<div id="primary">
	<div class="entry static">
		<div class="post-meta">
			<h1 class="post-title" id="error-404"><?php _e("Error 404",TEMPLATE_DOMAIN); ?></h1>
		</div>
		
		<div class="post-content">
			<p><?php _e("The page you are looking for does not exist; it may have been moved, or removed altogether. You might want to try the search function. Alternatively, return to the",TEMPLATE_DOMAIN); ?> <a href="<?php echo get_settings('home'); ?>"><?php _e("front page",TEMPLATE_DOMAIN); ?></a>.</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>