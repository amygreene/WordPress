<?php get_header(); ?>

  <div id="main">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h3 class="pagetitle"><?php _e('Archive for the','tropicala'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','tropicala'); ?></h3>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h3 class="pagetitle"><?php _e('Posts Tagged','tropicala'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h3>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h3 class="pagetitle"><?php _e('Archive for','tropicala'); ?> <?php the_time('F jS, Y'); ?></h3>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h3 class="pagetitle"><?php _e('Archive for','tropicala'); ?> <?php the_time('F, Y'); ?></h3>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h3 class="pagetitle"><?php _e('Archive for','tropicala'); ?> <?php the_time('Y'); ?></h3>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h3 class="pagetitle"><?php _e('Author Archive','tropicala'); ?></h3>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h3 class="pagetitle"><?php _e('Blog Archives','tropicala'); ?></h3>
    <?php } ?>


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

    <h2 class="center"><?php _e('Not Found','tropicala'); ?></h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
