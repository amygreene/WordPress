<?php get_header();?>
<div id="main">
	<div id="content">
		<p class="pagenav">
			<span class="navleft"><?php previous_post_link('&laquo; %link') ?></span>
			<span class="navright"><?php next_post_link('%link &raquo;') ?></span>
		</p>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
            <p class="box right">
              <span class="month">
                <?php the_time('M') ?>
              </span>
              <span class="day">
                <?php the_time('d') ?>
              </span>
              <span class="year">
                <?php the_time('Y') ?>
              </span>
            </p>
            <p class="box left"><!--<img src="<?php bloginfo('stylesheet_directory');?>/img/<?php the_author_login();?>.jpg" alt="Profile Image of <?php the_author();?>" title="P<?php _e('rofile Image of',TEMPLATE_DOMAIN); ?> <?php the_author();?>" />--><?php echo get_avatar( get_the_author_email(), '25' ); ?><br/><?php the_author_posts_link(); ?></p>
            <h2 class="title"><?php the_title(); ?></h2>
            <div class="meta">
				      <p><?php _e('Filed under',TEMPLATE_DOMAIN);?> <?php the_category(',') ?> <?php edit_post_link(__('edit',TEMPLATE_DOMAIN),'',''); ?></p>
			      </div>
			      <div class="entry">


<?php the_content(); ?>


<p class="post-tags"><?php if (function_exists('the_tags')) the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', '<br/>'); ?></p>
      			</div>
            <p class="comments">
              <?php comments_popup_link(__('No responses yet',TEMPLATE_DOMAIN), __('One response so far',TEMPLATE_DOMAIN), __('% responses so far',TEMPLATE_DOMAIN)); ?>
            </p>
	        </div>

<?php endwhile; ?>

<?php comments_template('',true); ?>

<?php else: ?>

          <p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ',__('&#171; Prev',TEMPLATE_DOMAIN),__('Next &#187;',TEMPLATE_DOMAIN)) ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>