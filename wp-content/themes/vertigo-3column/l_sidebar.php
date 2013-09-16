<!-- begin l_sidebar -->

<div id="l_sidebar">

	<ul id="l_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
	
	<li id="Recent">
	<h2><?php _e("Recently Written",TEMPLATE_DOMAIN); ?></h2>
		<ul>
			<?php get_archives('postbypost', 10); ?>
		</ul>
	</li>

	<li id="Categories">
	<h2><?php _e('Categories',TEMPLATE_DOMAIN);?></h2>
		<ul>
			<?php wp_list_cats('sort_column=name'); ?>
		</ul>
	</li>
		
	<li id="Archives">
	<h2><?php _e('Archives',TEMPLATE_DOMAIN);?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>

	<li id="Admin">
	<h2><?php _e("Admin",TEMPLATE_DOMAIN); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>

			<?php wp_meta(); ?>
		
		</ul>

	<?php endif; ?>
	</ul>
	
</div>

<!-- end l_sidebar -->