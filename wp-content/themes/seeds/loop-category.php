<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) { ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php } ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php roots_post_inside_before(); ?>
      <header>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('category-thumb');
          } else { ?>
          <img width="300" height="150" src="<?php echo get_template_directory_uri(); ?>/img/seeds_logo_placeholder_cat.png" class="attachment-category-thumb wp-post-image" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
          <?php } ?>
        </a>

        <?php if (get_post_meta($post->ID, "my_shorttitle", true)) { ?> <!--Check for short title, else display regular title-->
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_post_meta($post->ID, "my_shorttitle", true); ?></a></h2>
        <?php } else { ?>
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        <?php } ?>

        <?php roots_entry_meta(); ?>
      </header>
      <div class="entry-content entry-content-archive">
        <?php if (is_archive() || is_search()) { ?>
          <?php the_excerpt(); ?>
        <?php } else { ?>
          <?php the_content(); ?>
        <?php } ?>
      </div>
      <footer>
        <hr>
      </footer>
    <?php roots_post_inside_after(); ?>
    </article>
  <?php roots_post_after(); ?>
<?php endwhile; /* End loop */ ?>

<?php /* Display navigation to next/previous pages when applicable, Chris */ ?>
<?php if ($wp_query->max_num_pages > 1) { ?>
  <nav id="post-nav" class="pager">
    <div class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></div>
    <div class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></div>
  </nav>
<?php } ?>