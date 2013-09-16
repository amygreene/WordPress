<?php get_header(); ?>
	    
    <div id="content">
	<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336x280-bluebird"); } ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
<!-- item -->
				<div class="item entry" id="post-<?php the_ID(); ?>">
				          <div class="itemhead">
				            <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				            <div class="date"><?php the_time(__('F jS, Y')) ?> <?php the_tags( '&nbsp;' . __( 'Tagged' ) . ' ', ', ', ''); ?> </div>



<?php if( is_archive() || is_search() || is_category() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>

<?php } else { ?>

		<?php the_content(__('Continue reading  &raquo;','bluebird')); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>

<?php } ?>






						 
				          <small class="metadata">
							 <?php _e('Filed under','bluebird');?> <span class="category"><?php the_category(', ') ?> </span> | <?php edit_post_link(__('Edit','bluebird'), '', ' | '); ?> <?php comments_popup_link(__('Comment (0)','bluebird'), __(' Comment (1)','bluebird'), __('Comments (%)','bluebird')); ?></small>
							 <div style="clear:both;"></div>
<div style="clear:both;"></div>
				 </div></div>
<!-- end item -->

<?php if(!is_page()) { ?>
<?php comments_template('',true); // Get wp-comments.php template ?>
<?php } else { ?>
<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
<?php } ?>


		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Entries','bluebird')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Next Entries &raquo;','bluebird')) ?></div>
			<p> </p>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found','bluebird');?></h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",'bluebird');?></p>

	<?php endif; ?>
<!-- end content -->

	</div>
	<div id="secondary">

<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

	</div>
<?php get_footer(); ?>