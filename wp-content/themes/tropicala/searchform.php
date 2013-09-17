      <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
        <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="image" id="search_submit" src="<?php bloginfo('stylesheet_directory'); ?>/images/go.png" value="Search" />
      </form>