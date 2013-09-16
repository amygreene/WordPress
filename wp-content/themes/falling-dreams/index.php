<?php
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post"> 
  <div class="data">
    <?php the_time(__('F jS, Y')) ?>
  </div>
  <h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php the_title(); ?>
    </a></h3>

  <div class="autor"><?php if(!is_page()) { ?>   <?php _e('Posted by','falling-dreams');?> <?php the_author() ?> <?php _e('in');?> <?php the_category(', ') ?> <?php the_tags( '&nbsp;' . __( 'Tagged','falling-dreams' ) . ' ', ', ', ''); ?>&nbsp;&nbsp;&nbsp;<?php } ?>
    <?php edit_post_link(__('Edit','falling-dreams'), '',''); ?>
  </div>
  <div class="storycontent">


<?php if( is_tag() || is_search() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>

<?php } else { ?>

<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php the_content(__('(more...)','falling-dreams')); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>

<?php } ?>

  
  </div>
                 <?php if ( comments_open() ) { ?>
  <div class="feedback">
    <?php comments_popup_link(__('0 Comments','falling-dreams'), __('1 Comments','falling-dreams'), __('% Comments','falling-dreams')); ?>
  </div>
    <?php } ?>
  <!--
	<?php trackback_rdf(); ?>
	-->
</div>

<?php if(!is_page()) { ?>
<?php comments_template('',true); // Get wp-comments.php template ?>
<?php } else { ?>
<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
<?php } ?>

<?php endwhile; else: ?>
<p>
  <?php _e('Sorry, no posts matched your criteria.','falling-dreams'); ?>
</p>
<?php endif; ?>
<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page','falling-dreams'), __('Next Page &raquo;','falling-dreams')); ?>
<?php get_footer(); ?>
