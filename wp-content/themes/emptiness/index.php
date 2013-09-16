      <?php get_header(); ?>

      <div id="body">

        <div id="content">

          <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

              <div class="item">

                <div class="vcard side left">

                  <span class="date"><?php the_time('j M Y, g:ia') ?></span><br/>

                  <span class="labels"><?php the_category(' ') ?><?php the_tags(': ', ' '); ?></span><br/>

                  <?php _e('by', 'emptiness'); ?> <span class="fn"><?php the_author_posts_link(); ?></span><br/>

                  <?php echo get_avatar( get_the_author_id(), $size = '48', $default = 'identicon' ); ?><br/>

                  <?php comments_popup_link(__('leave a comment', 'emptiness'), __('1 comment', 'emptiness'), __('% comments', 'emptiness')); ?>

                  <?php edit_post_link(__('edit', 'emptiness'), '', ''); ?><br/>

                  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Left Sidebar') ) : ?>

                  <?php endif; ?>

                </div>

                <div class="main">

                  <h2><a href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'emptiness'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>



                 <?php if( is_archive() || is_search() || is_category() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>

<?php } else { ?>

<?php the_content(__('more &raquo;', 'emptiness')); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>

<?php } ?>





                </div>

              </div>

            <?php endwhile; ?>

             <?php if (is_page()) { ?>
             <?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
             <?php } ?>



            <div class="item">

              <div class="side left">

                &nbsp;

              </div>

              <div class="main">

                <?php previous_post_link('&larr; %link') ?>&nbsp;&nbsp;<?php next_post_link('%link &rarr;') ?>

              </div>

            </div>

            <div class="item">

              <div class="side left">

                &nbsp;

              </div>

              <div class="main">

                <?php posts_nav_link('&nbsp;&nbsp;', __('&larr; Previous Page', 'emptiness'), __('Next Page &rarr;', 'emptiness')); ?>

              </div>

            </div>

          <?php else : ?>

            <div class="item">

              <div class="side left">

                &nbsp;

              </div>

              <div class="main">

                <h2><?php _e('Posts Not Found', 'emptiness'); ?></h2>

                <p><?php _e('Sorry, no posts matched your criteria.', 'emptiness'); ?></p>

              </div>

            </div>

          <?php endif; ?>

        </div>

        <?php get_sidebar(); ?>

      </div>

      <?php get_footer(); ?>