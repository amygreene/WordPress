<?php get_header(); ?>

<div id="content">
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

  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',TEMPLATE_DOMAIN);?> <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
	  <p class="postmeta">
	  <span class="timr">
      <?php _e("Post",TEMPLATE_DOMAIN); ?> <?php _e('on',TEMPLATE_DOMAIN);?> <?php the_time(__('F jS, Y')) ?>
      </span>
       <?php _e("by",TEMPLATE_DOMAIN); ?> <?php the_author_posts_link() ?><?php the_tags( '&nbsp;' . __( 'and tagged',TEMPLATE_DOMAIN ) . ' ', ', ', ''); ?>
	  </a>
 </p>
 <div class="entry">
      <?php the_content(__('Read the rest of this entry &rarr;',TEMPLATE_DOMAIN)); ?>
    </div>
	<p class="postmetadata">
      <?php _e("Category",TEMPLATE_DOMAIN); ?>
	  <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '<span class="editr">', ' | </span>'); ?>
      <span class="commr">
      <?php comments_popup_link(__('No Comments &rarr;',TEMPLATE_DOMAIN), __('1 Comment &rarr;',TEMPLATE_DOMAIN), __('% Comments &rarr;',TEMPLATE_DOMAIN) ); ?>
      </span></p> 
   </div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link(__('&larr; Previous Entries',TEMPLATE_DOMAIN)) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Next Entries &rarr;',TEMPLATE_DOMAIN)) ?>
    </div>
  </div>
  <?php else : ?>
  <h2 class="center"><?php _e('Not Found',TEMPLATE_DOMAIN);?></h2>
  <p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN);?></p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
