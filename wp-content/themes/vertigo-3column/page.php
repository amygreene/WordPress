<?php get_header(); ?>

<div id="content">

<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(__('Read more',TEMPLATE_DOMAIN));?><div style="clear:both;"></div>
 			
	<!--
	<?php trackback_rdf(); ?>
	-->
	
	<?php endwhile; ?>
    
   <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>

    <?php else: ?>
	
	<p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back',TEMPLATE_DOMAIN), __('keep looking &raquo;',TEMPLATE_DOMAIN)); ?>

	</div>
	
<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>