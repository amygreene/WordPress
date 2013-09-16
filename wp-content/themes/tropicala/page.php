<?php get_header(); ?>

  <div id="main">
  
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
    <div class="article" id="post-<?php the_ID(); ?>">
      
    <h2 class="header"><span><?php the_title(); ?></span></h2>
    
      <div class="entry clearfix">

        <?php the_content(__('<p>Read the rest of this page &raquo;</p>','tropicala') ); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

      </div>
    </div>
    <?php endwhile; endif; ?>

    <?php edit_post_link(__('Edit this entry.','tropicala'), '<p>', '</p>'); ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>