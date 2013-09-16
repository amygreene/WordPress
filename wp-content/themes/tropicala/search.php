<?php get_header(); ?>

  <div id="main">

  <?php if (have_posts()) : ?>

    <h3 class="pagetitle">Search Results</h3>

    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </div>


    <?php while (have_posts()) : the_post(); ?>

      <div class="article">
        <h2 class="header" id="post-<?php the_ID(); ?>"><span><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></h2>
        
        <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

        <ul class="article_footer">
          <?php the_tags('<li>Tags: ', ', ', '', '</li>'); ?>
          <li> Filed under <?php the_category(', ') ?></li>
          <?php edit_post_link('Edit', '<li>', '</li>'); ?>
          <li class="last"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
        </ul>
      </div>

    <?php endwhile; ?>

    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </div>

  <?php else : ?>

    <h2 class="center">No posts found. Try a different search?</h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>