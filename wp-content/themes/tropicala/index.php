  <?php get_header(); ?>

    <div id="main">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <div class="article" id="post-<?php the_ID(); ?>">
        
          <h2 class="header"><span>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </span></h2>
        
          <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

          <div class="entry clearfix">
            <?php the_content('Read the rest of this entry &raquo;'); ?>
          </div>
        
          <ul class="article_footer">
            <li class="first"> Filed under <?php the_category(', ') ?></li>
            <?php the_tags('<li>Tags: ', ', ', '</li>', ''); ?>
            <?php edit_post_link('Edit', '<li>', '</li>'); ?>
            <li><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
          </ul>
        
        </div>

      <?php endwhile; ?>

      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>

    <?php else : ?>

      <h2 class="center">Not Found</h2>
      <p class="center">Sorry, but you are looking for something that isn't here.</p>
      <?php include (TEMPLATEPATH . "/searchform.php"); ?>

    <?php endif; ?>

    </div>

  <?php get_sidebar(); ?>

  <?php get_footer(); ?>
