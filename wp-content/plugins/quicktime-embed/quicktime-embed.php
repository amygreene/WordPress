<?php
/*
Plugin Name: QuickTime Embed
Plugin URI: http://www.channel-ai.com/blog/plugins/quicktime-embed/
Description: Standards compliant QuickTime embedding in your blog posts using Javascript, supports vodcasting
Version: 0.2
Author: Yaosan Yeo
Author URI: http://www.channel-ai.com/blog/
*/

/*  Copyright 2008  Yaosan Yeo  (email : eyn@channel-ai.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// configurable variables (global variables)

	$qt_autostart = 0;					// 0 to disable autostart, 1 to enable
	$qt_kioskmode = 0;					// 0 to disable kioskmode, 1 to enable
	$qt_targetcache = 1;				// 0 to disable caching of target movie, 1 to enable
	$qt_showcontrol = 1;				// 0 to disable control bar, 1 to enable (this only affects movies with no poster)
	$qt_useposter = 1;					// 0 to disable poster, 1 to enable
	$qt_autoposter = 0;					// 0 to disable automatic poster i.e. either append movie filename with "_poster.mov" as poster movie if no poster argument is given in tags and $qt_posterpath is undefined, or look for poster movie with the same filename in the directory storing poster movies 
	$qt_globalposter = "";				// path to global poster (e.g. "/poster.mov"), this overrides everything, leave blank to disable
	$qt_posterpath = "";				// path to directory storing poster movies (e.g. "/poster/"), used when only filename is given as poster argument
	$qt_moviepath = "";					// path to directory storing QuickTime movies (e.g. "/qt/"), used when only filename is given as movie argument
	$qt_ipodtext = "iPod version";		// text for link to download iPod video files

// end of configurable variables

function qt_parse($content)
{
	$content = preg_replace_callback( "/(<p>)?\[qt:([^]]+)](<\/p>)?/i", "qt_embed", $content );
	return $content;
}

function qt_embed($matches)
{
	global $qt_autostart, $qt_kioskmode, $qt_targetcache, $qt_showcontrol, $qt_useposter, $qt_autoposter, $qt_globalposter, $qt_posterpath, $qt_moviepath, $qt_ipodtext;

	// return custom message for RSS feeds
	if (is_feed()) {
		return "[See post to watch QuickTime movie]" ;
	}

	$input = explode(" ", $matches[2]);
	$arg = count($input);

	$hasposter = 0;
	$hasipod = 0;

	if ($arg == 5) {
		list($movie, $poster, $ipod, $width, $height) = $input;
		$hasposter = 1;
		$hasipod = 1;
	} else if ($arg == 4) {
		list($movie, $poster, $width, $height) = $input;
		$hasposter = 1;
	} else {
		list($movie, $width, $height) = $input;
	}
	
	// object id
	$id = basename($movie, ".mov");
	
	// construct poster path
	if ($qt_useposter) {
		if ($qt_globalposter) {
			$poster = $qt_globalposter;
		}
		// explicit path from tag arguments
		else if ($hasposter) {
			if ( qt_test_relative_absolute($poster) == 1 )					// is the path site relative or absolute?
				$poster = $poster;											// yes, no change to poster
			else
				$poster = trailingslashit($qt_posterpath) . $poster;		// no i.e. with filename only, so append with $qt_posterpath
		} 
		// assume poster is in the same directory as movie
		else if ($qt_autoposter) {
			if (!empty($qt_posterpath))										// is poster directory defined?
				$poster = trailingslashit($qt_posterpath) . $id . ".mov";	// yes, find poster movie in poster directory
			else
				$poster = str_replace(".mov","_poster.mov",$movie);			// no, append "_poster.mov" as poster movie
		}
	} else {
		$poster = 0;	// disable poster
	}
	
	// construct movie path
	if  ( qt_test_relative_absolute($movie) == 0 )							// is the path NOT site relative or absolute?
		$movie = trailingslashit($qt_moviepath) . $movie;					// yes i.e. only filename is given, so append it to movie path
		
	// starting movie
	$start = (!empty($poster)) ? $poster : $movie;

	// poster
	if (!empty($poster)) {
		$href = qt_addParam("href", $movie);
		$target = qt_addParam("target", "myself");
		$controller = qt_addParam("controller", "false");
		$height += 16;
	} else if (!$qt_showcontrol) {
	
	// controller
		$controller = qt_addParam("controller", "false");
	} else {
		$height += 16;
	}
	
	// autostart
	if (!$qt_autostart) {
		$autostart = qt_addParam("autostart","false");
	}
	
	// kiosk mode
	if ($qt_kioskmode) {
		$kioskmode = qt_addParam("kioskmode","true");
	}
	
	if ($qt_targetcache) {
		$targetcache = qt_addParam("targetcache","true");
	}

	// output link to download video for ipod if exist
	if ($hasipod) {
		$ipod_link = '<br /><p><img src="' . get_settings('siteurl') . '/wp-content/plugins/quicktime-embed/ipod.png" alt="iPod" /> <a href="' . $ipod . '">' . $qt_ipodtext . '</a>';

		// output filesize information of m4v
		$url = qt_make_absolute($ipod);
		
		if ( $headers = wp_get_http_headers($url) ) {
			$len = (int) $headers['content-length'];
		
			if ($len) {
				$size = round($len / 1048576, 1);
				$ipod_link .= " ($size MB)";
			}
		}
		
		$ipod_link .= "</p>";
	}

	ob_start();
	print <<< QTObject
<script type="text/javascript">
<!--
	var myQTObject = new QTObject("{$start}", "{$id}", "{$width}", "{$height}"); {$href}{$target}{$controller}{$autostart}{$kioskmode}{$targetcache}
	myQTObject.write();
//-->
</script>
<noscript><p><em>[ Javascript required to view QuickTime movie, please turn it on and refresh this page ]</em></p></noscript>
{$ipod_link}
QTObject;
	$output = ob_get_clean();
	
	return $output;
}

function qt_addParam($var, $value)
{
	$output = "\n\t" . 'myQTObject.addParam("' . $var . '","' . $value . '");';
	return $output;
}

// Make URL out of site relative path
function qt_make_absolute($path)
{
	$url = parse_url(get_settings('siteurl'));
	$site = "http://" . $url["host"];	// no trailing slash

	if (substr($path,0,1) == '/')
		$path = $site . $path;
	
	return $path;
}

// Test if path is site relative or absolute, if it is, return 1, else 0
function qt_test_relative_absolute($path)
{
	if ( (substr($path,0,1) == '/') || (stristr($path, "://")) )
		return 1;
	else
		return 0;
}

// Import external javascript in Wordpress header
function qt_head()
{
	echo '<script type="text/javascript" src="' . get_settings('siteurl') . '/wp-content/plugins/quicktime-embed/qtobject.js"></script>';
	echo "\n";
}

add_filter('the_content', 'qt_parse');
add_action('wp_head', 'qt_head');
?>
