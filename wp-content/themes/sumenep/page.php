<?php get_header(); ?>

<div id="content" class="narrowcolumn">
   <div id="pre">
 <div id="headr">
    <h1><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></h1>
    <div class="description">
      <?php bloginfo('description'); ?>
    </div>
  </div>
  </div>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2>
      <?php the_title(); ?>
    </h2>
    <div class="entry">
      <?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>',TEMPLATE_DOMAIN)); ?>
      <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages',TEMPLATE_DOMAIN).':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

     <?php edit_post_link(__('Edit this entry.',TEMPLATE_DOMAIN), '<p>', '</p>'); ?>          
    </div>
  </div>
  <?php endwhile; ?>

  <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>

  <?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
