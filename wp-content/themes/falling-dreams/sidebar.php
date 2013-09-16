 <!-- begin sidebar -->
<div id="side"> 
  <ul><?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("16090linkunitnocolor"); } ?>      
  <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

      <li id="search">
	<label for="s">
      <h2>
        <?php _e('Search','falling-dreams'); ?>
      </h2></label>
      <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
        <div> 
          <input type="text" name="s" size="18" />
          <br>
          <input type="submit" id="submit" name="Submit" value="<?php _e('Search','falling-dreams');?>" />
        </div>
      </form>
    </li>
    <li id="categories">
      
	  <ul><?php wp_list_pages('title_li='); ?> </ul>
	  
	  <h2>
       
	   
	   
	   
	    <?php _e('Categories','falling-dreams'); ?>
      </h2>
      <ul>
        <?php list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0,'','','','','') ?>
      
	 <?php endif; ?>
	  </ul>
    </li>

    <li id="archives">
      <h2>
        <?php _e('Monthly','falling-dreams'); ?>
      </h2>
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
	<?php get_links_list(); ?>
 <?php if (function_exists('wp_theme_switcher')) { ?>
    <li>
      <h2>
        <?php _e('Themes','falling-dreams'); ?>
      </h2>
      <?php wp_theme_switcher(); ?>
    </li>
    <?php } ?>
	
 <li id="meta">
      <h2>
        <?php _e('Meta','falling-dreams'); ?>
      </h2>
	  <ul>
	  <li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" width="80" height="15" border="0" alt="Subscribe to RSS feed"/></a></li>	  
	  <li><a href="<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rsscomments.gif" width="80" height="15" border="0" alt="The latest comments to all posts in RSS"/></a></li>
	  <li><a href="<?php bloginfo('atom.php'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/atom.gif" width="80" height="15" border="0"/ alt="Subscribe to Atom feed"/></a></li>

    </li>
  </ul>
</div>
<!-- end sidebar -->