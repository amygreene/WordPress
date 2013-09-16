<?php get_header();?>
<div id="main">
	<div id="content">
      <div class="post">
        <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="entry">
          <h2><?php _e('Recent 20 Posts',TEMPLATE_DOMAIN); ?></h2>
          <ul>
            <?php wp_get_archives('type=postbypost&limit=20'); ?>
          </ul>
          <h2><?php _e('by Category',TEMPLATE_DOMAIN); ?></h2>
          <ul>
            <?php wp_list_cats('optioncount=1');?>
          </ul>
          <h2><?php _e('by Month',TEMPLATE_DOMAIN); ?></h2>
          <ul>
            <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
          </ul>
        </div>
        <p class="comments"></p>	          
      </div>      
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>