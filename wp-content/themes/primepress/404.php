<?php get_header(); ?>
	<div id="primary">
		<div class="entry">
		<h1 class="page-title"><?php _e('Oops! Page Not Found (Error 404)', 'primepress'); ?></h1>
			<div class="entry-content">
				<p><?php _e('Oops... sorry! For one reason or another the <strong>page</strong> you are looking for could not be found and its probably not your fault. It might be:', 'primepress'); ?></p>
				<ul>
					<li><?php _e('A mis-typed URL', 'primepress'); ?></li>
					<li><?php _e('An out-of-date or a faulty referral from another site', 'primepress'); ?></li>
					<li><?php _e('Or an old page that has been deleted or moved', 'primepress'); ?></li>
				</ul> 
				<p><?php _e('You could maybe visit the <a href="<?php bloginfo("url"); ?>">Home Page</a> to start fresh or try the search.', 'primepress'); ?></p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
		</div>
	</div><!--#primary-->
	
<?php get_sidebar(); ?>

</div>
	
<?php get_footer(); ?>