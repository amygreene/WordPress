<div id="sidebar">

  <div id="searchdiv">


    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">


      <input type="text" name="s" id="s" size="20"/>


      <input name="sbutt" type="submit" value="<?php _e('Find','blue-moon'); ?>" alt="Submit"  />


    </form></div>

 
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>


<ul>


<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','blue-moon'); ?>"><img src="http://www.feedburner.com/fb/images/pub/feed-icon32x32.png"></a>

</ul>


<h2><?php _e('Categories','blue-moon');?></h2>


<ul><?php wp_list_categories('orderby=id&show_count=1&use_desc_for_title=0&title_li='); ?></ul>


<?php if(function_exists("wp_tag_cloud")) { ?>
<h2><?php _e('Tags','blue-moon');?></h2>
<ul>
<li id="wp-tags"><?php wp_tag_cloud('smallest=9&largest=24&number=50&orderby=count&order=DESC'); ?></li>
</ul>
<?php } ?>


<h2><?php _e('Monthly Archives','blue-moon');?></h2>


  <ul>


    <?php wp_get_archives('type=monthly'); ?>


  </ul>


<?php endif; ?>


</div>


