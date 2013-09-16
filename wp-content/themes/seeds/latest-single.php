<!--********************* latest-single.php **************************
*********** Display latest posts on full post pages ******************
*******************************************************************-->

<h3>Latest Posts</h3>
<ul class="latest-single">
  <?php
  $currentID = get_the_ID();
  $my_query = new WP_Query( array('category_name' => 'article,tutorial', 'showposts' => '3', 'post__not_in' => array($currentID)));
  while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('latest-thumb');
          } else { ?>
          <img src="<?php echo get_template_directory_uri(); ?>/img/seeds_logo_placeholder.png" />
          <?php } ?>

        <!-- <?php the_post_thumbnail('medium'); ?> -->
      </a>
      <div class="latest-overlay">
        <span><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
      </div>
    </li>
  <?php endwhile; ?>
</ul>