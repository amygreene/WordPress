<?php get_header(); ?>

<div id="content" class="widecolumn">
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
  <div class="navigation">
    <div class="alignleft">
      <?php previous_post_link('&larr; %link') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link &rarr;') ?>
    </div>
  </div>
  <br class="clear" />
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:',TEMPLATE_DOMAIN);?> <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
	   <p class="postmeta">
	  <span class="timr">
      <?php _e("Post",TEMPLATE_DOMAIN); ?> <?php _e('on',TEMPLATE_DOMAIN);?> <?php the_time(__('F jS, Y')) ?>
      </span>
       <?php _e("by",TEMPLATE_DOMAIN); ?> <?php the_author() ?><?php the_tags( '&nbsp;' . __( 'and tagged',TEMPLATE_DOMAIN ) . ' ', ', ', ''); ?>
	  </a>
	  </p>
       <div class="entry">

      <?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>',TEMPLATE_DOMAIN)); ?>

      <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages',TEMPLATE_DOMAIN).':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>


    </div>
   <p class="postmetadata">
      <?php _e("Category",TEMPLATE_DOMAIN); ?>
      <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '<span class="editr">', ' | </span>'); ?>
      <span class="commr">
      <?php comments_popup_link(__('No Comments &#187;',TEMPLATE_DOMAIN), __('1 Comment &#187;',TEMPLATE_DOMAIN), __('% Comments &#187;',TEMPLATE_DOMAIN)); ?>
      </span></p>
  </div>
  <?php comments_template('',true); ?>
  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN);?></p>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
