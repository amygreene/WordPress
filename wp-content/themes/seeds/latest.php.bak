<!--********************* latest.php *********************************
********** Display latest posts on front pages ***********************
*******************************************************************-->


<?php roots_loop_before(); ?>
<?php
$currentID = get_the_ID();
$my_query = new WP_Query( array('category_name' => 'article,tutorial', 'showposts' => '5', 'post__not_in' => array($currentID)));
while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
<div class="seeds_latest">
	<?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail');
          } else { ?>
          <img width="80" height="80" src="<?php echo get_template_directory_uri(); ?>/img/seeds_logo_placeholder_thumb.png" class="attachment-thumbnail wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
          <?php } ?>
	<?php if (get_post_meta($post->ID, "my_shorttitle", true)) { ?> <!--Check for short title, else display regular title-->
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_post_meta($post->ID, "my_shorttitle", true); ?></a></h3>
      <?php } else { ?>
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
      <?php } ?>
	<?php roots_entry_meta(); ?>
	<!-- <?php the_excerpt(); ?> -->
</div>
<hr />
<?php endwhile; ?>
<?php roots_loop_after(); ?>