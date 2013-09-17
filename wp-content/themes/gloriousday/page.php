<?php get_header();?>
<div id="main">
	<div id="content">
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
            <h2 class="title"><?php the_title(); ?></h2>
			  <div class="entry">
			  <?php edit_post_link(); ?>
              <?php the_content(__('Continue Reading &#187;',TEMPLATE_DOMAIN)); ?>
              <?php wp_link_pages(); ?>
              <?php $sub_pages = wp_list_pages( 'sort_column=menu_order&depth=1&title_li=&echo=0&child_of=' . $id );?>
              <?php if ($sub_pages <> "" ){?>
              <p class="meta"><?php _e('This page has the following sub pages.',TEMPLATE_DOMAIN); ?></p>
              <ul>
                <?php echo $sub_pages; ?>
              </ul>
              <?php }?>
            </div>
           <?php if ( comments_open() ) { ?> <p class="comments">
              <?php comments_number(__('No responses yet',TEMPLATE_DOMAIN), __('One response so far',TEMPLATE_DOMAIN), __('% responses so far',TEMPLATE_DOMAIN)); ?>
            </p><?php } ?> 

	        <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>

	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ',__('&#171; Prev',TEMPLATE_DOMAIN),__('Next &#187;',TEMPLATE_DOMAIN)) ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>