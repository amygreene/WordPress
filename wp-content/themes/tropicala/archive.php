<?php get_header(); ?>

  <div id="main">

    <?php if (have_posts()) : ?>

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <h3 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h3>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h3 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h3 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h3>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h3 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h3>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h3 class="pagetitle">Archive for <?php the_time('Y'); ?></h3>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h3 class="pagetitle">Author Archive</h3>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h3 class="pagetitle">Blog Archives</h3>
    <?php } ?>


    <div class="navigation">
      <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
      <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
    </div>

    <?php while (have_posts()) : the_post(); ?>
    <div class="article">
        <h2 class="header" id="post-<?php the_ID(); ?>">
          <span>
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?>
            </a>
          </span>
        </h2>
        <p class="byline">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> </p>

        <div class="entry clearfix">
          <?php the_content() ?>
        </div>

        <ul class="article_footer">
          <li class="first"> Filed under <?php the_category(', ') ?></li>
          <?php the_tags('<li>Tags: ', ', ', '', '</li>'); ?>
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

    <h2 class="center">Not Found</h2>
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>

  <?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
