<?php get_header(); ?>

<div id="content">

<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<p><?php _e('Posted on',TEMPLATE_DOMAIN);?><?php the_time('F j, Y'); ?>&nbsp;<?php edit_post_link(__('Edit Post',TEMPLATE_DOMAIN), '', ''); ?><br /><?php _e('Filed under',TEMPLATE_DOMAIN);?> <?php the_category(', ') ?>  <?php the_tags( '' . __( ' and tagged' ,TEMPLATE_DOMAIN) . ' ', ', ', ''); ?> | <?php comments_popup_link(__('Leave a Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN)); ?></p>
	<?php the_content(__('Read more'));?><div style="clear:both;"></div>
 			
	<!--
	<?php trackback_rdf(); ?>
	-->
	
	<?php endwhile; else: ?>
	
	<p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p><?php endif; ?>
	<p><?php posts_nav_link(' &#8212; ', __('&larr; Previous Page',TEMPLATE_DOMAIN), __('Next Page &rarr;',TEMPLATE_DOMAIN)); ?></p>

	</div>
	
<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>