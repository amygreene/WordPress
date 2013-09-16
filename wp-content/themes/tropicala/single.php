<?php get_header(); ?>

  <div id="main">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="navigation clearfix">
      <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
      <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
    </div>

    <div class="article" id="post-<?php the_ID(); ?>">
      <h2 class="header"><span><?php the_title(); ?></span></h2>

      <div class="entry clearfix">
        <?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>','tropicala')); ?>

        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

        <p class="entry_info">
          <small>
            <?php _e('This entry was posted','tropicala'); ?>
            <?php /* This is commented, because it requires a little adjusting sometimes.
              You'll need to download this plugin, and follow the instructions:
              http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
              /* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
            <?php _e('on','tropicala'); ?> <?php the_time('l, F jS, Y') ?> <?php _e('at','tropicala'); ?> <?php the_time() ?>
            <?php _e('and is filed under','tropicala'); ?> <?php the_category(', ') ?>.
            <?php _e('You can follow any responses to this entry through the','tropicala'); ?> <?php post_comments_feed_link('RSS 2.0'); ?>
            <?php _e('feed','tropicala'); ?>.

            <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
              // Both Comments and Pings are open ?>
              <?php _e('You can','tropicala'); ?> <a href="#respond"><?php _e('leave a response','tropicala'); ?></a>, <?php _e('or','tropicala'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','tropicala'); ?></a> <?php _e('from your own site','tropicala'); ?>.

            <?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
              // Only Pings are Open ?>
              <?php _e('Responses are currently closed, but you can','tropicala'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"><?php _e('trackback','tropicala'); ?></a> <?php _e('from your own site','tropicala'); ?>.

            <?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
              // Comments are open, Pings are not ?>
              <?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','tropicala'); ?>

            <?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
              // Neither Comments, nor Pings are open ?>
              <?php _e('Both comments and pings are currently closed.','tropicala'); ?>

            <?php } edit_post_link(__('Edit this entry','tropicala'),'','.'); ?>

          </small>
        </p>

      </div>
    </div>

  <?php comments_template('',true); ?>

  <?php endwhile; else: ?>

    <p><?php _e('Sorry, no posts matched your criteria.','tropicala'); ?></p>

<?php endif; ?>

  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
