<?php get_header(); ?>

  <div id="main">

  <?php if (have_posts()) : ?>

    <h3 class="pagetitle"><?php _e('Search Results', 'tropicala'); ?></h3>

    <div class="navigation">
    <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','tropicala')) ?></div>
      <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','tropicala')) ?></div>
    </div>


    <?php while (have_posts()) : the_post(); ?>

      <div class="article">
        <h2 class="header" id="post-<?php the_ID(); ?>">
          <span>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','tropicala'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?>
            </a>
          </span>
        </h2>
        <p class="byline"><?php _e('Posted by','tropicala'); ?> <?php the_author() ?> <?php _e('on','tropicala'); ?> <?php the_time('F jS, Y') ?> </p>

        <div class="entry clearfix">
          <?php the_excerpt() ?>
        </div>

        <ul class="article_footer">
          <li class="first"> <?php _e('Filed under','tropicala'); ?> <?php the_category(', ') ?></li>
          <?php the_tags('<li>Tags: ', ', ', '', '</li>'); ?>
          <?php edit_post_link(__('Edit','tropicala'), '<li>', '</li>'); ?>
          <li class="last"><?php comments_popup_link(__('No Comments','tropicala'), __('1 Comment','tropicala'), __('% Comments','tropicala')); ?></li>
        </ul>

      </div>

    <?php endwhile; ?>

    <div class="navigation">
     <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','tropicala')) ?></div>
      <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','tropicala')) ?></div>
    </div>

  <?php else : ?>

    <h2 class="center"><?php _e('No posts found. Try a different search?','tropicala'); ?></h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>