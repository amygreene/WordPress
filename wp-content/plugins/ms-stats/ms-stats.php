<?php
/*
Plugin Name: MS Stats
Plugin URI: http://www.orangebubble.co.uk/ms-stats
Description: Display Multisite site and user statistics using shortcodes.
Version: 0.1 BETA
Author: Viv Richards
Author URI: http://www.orangebubble.co.uk/
*/

/*
MS Stats (Wordpress Plugin)
Copyright (C) 2012 Viv Richards
Contact me at http://www.orangebubble.co.uk/contact/

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//tell wordpress to register the demolistposts shortcode
add_shortcode("ms-site-count", "multisite_sitecount_handler");
add_shortcode("ms-user-count", "multisite_usercount_handler");



//CODE TO GET SITE COUNT

function multisite_sitecount_handler() {
  //run function that actually does the work of the plugin
  $mis_output = multisite_sitecount_function();
  //send back text to replace shortcode in post
  return $mis_output;
}

function multisite_sitecount_function() {
  $blog_count = get_blog_count();
  $mis_site_output = $blog_count;
 
  //send back text to calling function
  return $mis_site_output;
}


//CODE TO GET USER COUNT

function multisite_usercount_handler() {
  //run function that actually does the work of the plugin
  $mis_output = multisite_usercount_function();
  //send back text to replace shortcode in post
  return $mis_output;
}

function multisite_usercount_function() {
  $user_count = get_user_count();
  $mis_user_output = $user_count;
 
  //send back text to calling function
  return $mis_user_output;
}
?>