<div class="side-columns">
<div class="col02">
  <div class="pages">
    <ul>
      <li class="<?php echo (is_home())?'current_page_item':''; ?>"><a href="<?php echo get_option('home'); ?>/"><?php _e('Home', 'notepad-chaos'); ?></a></li>
      <?php $pages = wp_list_pages('sort_column=menu_order&depth=1&title_li=&echo=0');
echo $pages; ?>
    </ul>
    <? unset($pages); ?>
  </div>
  <div class="pages-bottom"></div>
  <div class="categories-upper"></div>
  <div class="categories">
    <ul>
      <?php wp_list_categories('sort_column=name&hierarchical=0&title_li='); ?>
    </ul>
  </div>
  <div class="categories-btm"></div>

     <?php /* Widgetized sidebar, if you have the plugin installed. */
  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
<?php endif; ?>


</div>


<div class="col03">
  <div class="recent-posts">
    <?php
    query_posts('showposts=10');
	?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <ul>
      <li><a href="<?php the_permalink() ?>">
        <?php the_title() ?>
        <br />
        <span class="listMeta">
        <?php the_time('g:i a') ?>
        ,
        <?php the_time('F') ?>
        <?php the_time('j') ?>
        ,
        <?php the_time('Y') ?>
        </span></a></li>
    </ul>
    <?php endwhile; endif; ?>
  </div>
  <div class="postit-bottom"></div>
  <div class="about-box">
    <?php query_posts('pagename=about'); ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="links">
    <ul>
      <?php wp_list_bookmarks('categorize=0&title_li='); ?>
    </ul>
  </div>
  <div class="side-meta">
    <ul>
      <?php wp_register(); ?>
      <li>
        <?php wp_loginout(); ?>
      </li>
      <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
      <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
      <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
      <?php wp_meta(); ?>
    </ul>
  </div>


  <?php /* Widgetized sidebar, if you have the plugin installed. */
  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
<?php endif; ?>

</div>
<br clear="all" />
