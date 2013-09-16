<?php

// Return post entry meta information
function roots_entry_meta() {
  echo '<ul class="entry-meta">';
  echo '<li><span><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'.'<i class="icon-calendar"> </i> ' . get_the_date() .'</time></span></li>';
  echo '<li><span class="byline author vcard">' .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'.'<i class="icon-user"> </i> '. get_the_author() .'</a></li>';
  echo '</ul>';
}
