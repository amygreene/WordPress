<!-- Navigation --> 
  <div id="nav">
    <ul class="sf-menu">
      <li><a href="#">Categories</a>
        <ul>
			<?php wp_list_categories('orderby=name&title_li='); ?>
        </ul>
      </li>
      <li><a href="#">Pages</a>
        <ul>
        	<?php wp_list_pages('orderby=name&title_li='); ?>
        </ul>
      </li>
      <li><a href="#">Contact</a>
        <ul>
          <li><a href="#">1-800-867-5309</a></li>
          <li><a href="mailto:you@email.com">you@email.com</a></li>
        </ul>
      </li>
      <li><a href="#">Search</a>
        <ul>
          <li><?php if(function_exists('get_search_form')) : ?>
				<?php get_search_form(); ?>
				<?php else : ?>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				<?php endif; ?></li>
        </ul>
      </li>
    </ul>
  </div>
  
  
  
