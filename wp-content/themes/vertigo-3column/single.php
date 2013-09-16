<?php get_header(); ?>

<div id="content">

<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<p><?php _e('Posted by',TEMPLATE_DOMAIN);?> <?php the_author_posts_link(); ?> <?php _e("on",TEMPLATE_DOMAIN); ?> <?php the_time('F j, Y'); ?>&nbsp;<?php edit_post_link(__('Edit Post',TEMPLATE_DOMAIN), '', ''); ?><br /><?php _e('Filed under',TEMPLATE_DOMAIN);?> <?php the_category(', ') ?> <?php the_tags( '' . __( ' and tagged',TEMPLATE_DOMAIN ) . ' ', ', ', ''); ?></p>
	   <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>

	<?php the_content(__('Read more',TEMPLATE_DOMAIN));?>
	   <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
	<div style="clear:both;"></div>
 			
	<!--
	<?php trackback_rdf(); ?>
	-->
	
	<?php endwhile; else: ?>
	
	<p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p><?php endif; ?>
	
	<h3><?php _e('Comments',TEMPLATE_DOMAIN);?></h3>
	<?php comments_template('',true); // Get wp-comments.php template ?>

	</div>
	
<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>