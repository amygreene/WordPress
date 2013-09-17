<div id="sidebar">
  <div class="side2">
    <ul>
  	  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
     	  <li class="linkside">
	  <h2><?php _e("List Pages",TEMPLATE_DOMAIN); ?></h2>
	   <ul class="menu">
    <li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
    <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
	<?php wp_register('<li class="admintab">','</li>'); ?>
   </ul>
	  </li>
	  <li class="linkside">
	    <h2><?php _e("Archives",TEMPLATE_DOMAIN); ?></h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </li>
      <?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
      <?php /* If this is the frontpage */ if (is_home()) { ?>
      <?php wp_list_bookmarks(); ?>
      <?php } ?>
	  <li class="linkside">
	   <h2><?php _e("Meta",TEMPLATE_DOMAIN); ?></h2>
        <ul>
          <?php wp_register(); ?>
          <li>
            <?php wp_loginout(); ?>
          </li>
          <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
          <?php wp_meta(); ?>
        </ul>
	</li>
	<li class="linkside">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
      </li>
      <?php endif; // End of Dynamic Sidebar?>
  </ul>
  </div>
</div>
