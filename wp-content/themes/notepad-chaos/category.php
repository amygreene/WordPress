<?php get_header(); ?>
<div id="outer">
<div id="container">
  <div id="search">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
      <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="txtField" />
      <input type="submit" id="searchsubmit" class="btnSearch" value="<?php _e('Find It &raquo;', 'notepad-chaos'); ?>" />
    </form>
  </div>
  <div id="title">
    <h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
    <?php bloginfo('description'); ?></div>
</div>
<div id="content">
  <div class="col01">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
      <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
      <div class="post-inner">
        <div class="date-tab"><span class="month"><?php the_time('F') ?></span><span class="day"><?php the_time('j') ?></span></div>
        <div class="thumbnail"><?php $key="thumbnail"; echo get_post_meta($post->ID, $key, true); ?></div>
		<?php the_content(__('Read the rest of this entry &raquo;', 'notepad-chaos')); ?>
      </div>
      <div class="meta"><?php _e('posted under', 'notepad-chaos'); ?> <?php the_category(', ') ?> |  <?php comments_popup_link(__('No Comments &#187;', 'notepad-chaos'), __('1 Comment &#187;', 'notepad-chaos'), __('% Comments &#187;', 'notepad-chaos')); ?></div>
    </div>
    <?php endwhile; ?>
    <div class="post-nav"><span class="previous"><?php next_posts_link(__('&laquo; Older Entries', 'notepad-chaos')) ?></span><span class="next"><?php previous_posts_link(__('Newer Entries &raquo;', 'notepad-chaos')) ?></span></div>
    <?php else : ?>
    <div class="no-results">
<h3><?php _e('Not Found', 'notepad-chaos'); ?></h3>
    <p><?php _e("Sorry, but you are looking for something that isn't here.", 'notepad-chaos'); ?></p>
</div>
    <?php endif; ?>
  </div>
  <?php include ('columns.php'); ?>
   <?php get_sidebar(); ?></div><br clear="all" />
  </div>
<?php get_footer(); ?>