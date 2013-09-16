<?php get_header(); ?>

<body id="body-404">

<div id="intro">
	
	<span id="page-id"><?php _e("404",TEMPLATE_DOMAIN); ?></span>
	
	<div id="identity">
		
		<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div id="main-nav">
			<ul>
			<?php
				wp_list_pages('title_li=&sort_column=menu_order&depth=1');
			?>
			</ul>
		</div>

	</div>
		
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	
	<span class="clearer"></span>

</div>

<div id="summary">

	<div class="post-summary">
		<h2 class="page-title"><?php _e("Error: Not Found",TEMPLATE_DOMAIN); ?></h2>
	</div>	
	
	<span class="clearer"></span>

</div>	

<div id="post-content">

	<p><?php _e("Sorry, what you are looking for can't be found, try searching for it.",TEMPLATE_DOMAIN); ?></p>

</div>

<?php get_footer(); ?>
