<?php get_header(); ?>

<body id="body-page">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
	
<div id="intro">
	
	<span id="page-id"><?php _e("page",TEMPLATE_DOMAIN); ?></span>
	
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

	<div class="page-summary">
	
		<h2 class="page-title"><?php the_title(); ?></h2>
	</div>	
	
	<span class="clearer"></span>

</div>	

<div id="post-content">
	<?php the_content(); ?>
</div>

<div id="discussion-area">

	<div id="post-comments">
	   <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
	</div>
	
</div>
	
<?php endwhile; ?>

<?php else : ?>

	<h2><?php _e('Not Found',TEMPLATE_DOMAIN);?></h2>
	<p><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN);?></p>

<?php endif; ?>

<?php get_footer(); ?>
