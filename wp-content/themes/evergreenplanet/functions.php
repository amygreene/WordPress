<?php

automatic_feed_links();
$functions 	= TEMPLATEPATH . '/functions/';

require_once ($functions . 'class/kreative.php'); 
include_once ($functions . 'install.php');

if ( ! is_admin())
{
	include_once ($functions . 'header.php');
	include_once ($functions . 'footer.php');
}

if (is_admin())
{
	include_once ($functions . 'form.php');
	include_once ($functions . 'admin.php');
}

include_once ($functions . 'dynamic_sidebar.php');
include_once ($functions . 'widgets.php');

/* Theme Related Plugs */

include_once ($functions . 'brightsky.php');
include_once ($functions . 'kreative.php');

function kreative_pagenavi()
{
	if ( ! function_exists('wp_pagenavi')) 
	{
		include (TEMPLATEPATH . '/functions/wp-pagenavi.php');
	}
}

if ( ! class_exists('p75VideoEmbedder')) 
{
	require_once ($functions . 'wp-videocode.php');
}
