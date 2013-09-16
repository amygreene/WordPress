<?php /* Start loop
      Social Sharing buttons adapted from Kristi Hines
      http://kikolani.com/social-sharing-buttons-in-single-post-templates.html
 */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php roots_post_inside_before(); ?>
      <header>
        <hgroup>
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <h2 class="subheading">
            <?php $key="my_subtitle"; echo get_post_meta($post->ID, $key, true); ?> <!-- Get subheading from custom field -->
          </h2>
        </hgroup>
        <div class="entry-meta-container">
          <?php roots_entry_meta(); ?>
          <!-- Social Share Buttons -->
          <div class="social-single">
          <div id="twitterbutton"><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script><div> <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-counturl="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-via="tesc_compcenter" data-related="tesc_compcenter">Tweet</a></div></div>
          <div id="likebutton"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo rawurlencode(get_permalink()); ?>&layout=button_count&show_faces=false&width=100&action=like&font=verdana&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
          <!-- <div id="sharebutton" style="padding-top:1px;"><a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div> -->
          <div id="plusonebutton"><g:plusone size="medium"></g:plusone></div>
          </div><br /> <!-- End Social -->
        </div>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer>
        <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
        <?php $tags = get_the_tags(); if ($tags) { ?><p class="seeds-tags"><?php the_tags('<i class="icon-tags"></i> <span class="seeds-tags-label">Tags:</span> <span class="label label-inverse"><i class="icon-tag icon-white"></i> ', '</span> <span class="label label-inverse"><i class="icon-tag icon-white"></i> ', '</span><br />'); ?></p><?php } ?>
      </footer>
      <?php comments_template(); ?>
      <?php roots_post_inside_after(); ?>
    </article>
  <?php roots_post_after(); ?>
<?php endwhile; /* End loop */ ?>