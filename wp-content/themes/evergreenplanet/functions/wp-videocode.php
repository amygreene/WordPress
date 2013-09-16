<?php

define("P75_VIDEO_W", 300); // video width


class p75VideoEmbedder {

	var $url;
	var $width;
	var $height;
	var $defaultWidth;
	
	function p75VideoEmbedder($url) {
		$this->url = $url;
	}
	
	/**
	 * Sets the width of the video to use instead of the default.
	 */
	function setWidth($width) {
		$this->width = $width;
	}
	
	function setHeight($height) {
		$this->height = $height;
	}
	
	function setDefaultWidth($width) {
		$this->defaultWidth = $width;
	}
	
	/**
	 * Generates the proper embed code.
	 */
	function getEmbedCode() {
		// Watch out for flv and mp4's
		if( preg_match("/(\.flv|\.mp4)$/i", $this->url) ) {
			return $this->getJWPlayer();
		}
		
		switch( $this->getDomain() ) {
			case "youtube":
				return $this->getYouTube();
				
			case 'vimeo':
				return $this->getVimeo();
				
			case 'metacafe':
				return $this->getMetacafe();
				
			case 'seesmic':
				return $this->getSeesmic();
				
			case 'video.google':
				return $this->getGoogleVideo();
			
			case 'revver':
				return $this->getRevver();
				
			default:
				return false;
		}
	}
	
	/**
	 * Determine the domain name of the video.
	 */
	function getDomain() {
		$matches;
		preg_match("#^http://(?:www\.)?([\.a-z0-9]+)\.(?:com|tv|net)#i", $this->url, $matches);
		return $matches[1];
	}
	
	function calcWH($playerW, $playerH) {
		if( $this->width && $this->height )
			return array($this->width, $this->height);
		else if( $this->width )
			return array($this->width, ($playerH/$playerW)*$this->width);
		else if( $this->height )
			return array(($playerW/$playerH)*$this->height, $this->height);
		else
			return array($this->defaultWidth, ($playerH/$playerW)*$this->defaultWidth);
	}
	
	function getJWPlayer() {
		list($width, $height) = $this->calcWH(500, 400);
		
		return '<div id="videoContainer"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
	<script type="text/javascript" src="' . get_bloginfo('url') . '/wp-content/mediaplayer-viral/swfobject.js"></script>
	<script type="text/javascript">
		var s1 = new SWFObject("' . get_bloginfo('url') . '/wp-content/mediaplayer-viral/player-viral.swf","ply","'.$width.'","'.$height.'","9","#FFFFFF");
		s1.addParam("allowfullscreen","true");
		s1.addParam("allownetworking","all");
		s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars","file=' . $this->url . '");
		s1.write("videoContainer");
	</script>';
	}
	
	function getYouTube() {
		$matches = array();
		
		// example: http://www.youtube.com/watch?v=R7yfISlGLNU
		preg_match("#http://(?:www\.)?youtube\.com/watch\?v=([_\-a-z0-9]+)#i", $this->url, $matches);
		
		if( strstr($this->url, "&fmt=22") ) // Check for HD
		{
			list($width, $height) = $this->calcWH(850, 500);
			return '<object width="' . $width . '" height="' . $height . '"><param value="http://www.youtube.com/v/' . $matches[1] . '&ap=%2526fmt%3D22" name="movie" /><param value="window" name="wmode" /><param value="true" name="allowFullScreen" /><embed width="' . $width . '" height="' . $height . '" wmode="window" allowfullscreen="true" type="application/x-shockwave-flash" src="http://www.youtube.com/v/' . $matches[1] . '&ap=%2526fmt%3D22"></embed></object>';
		}
		else
		{
			list($width, $height) = $this->calcWH(425, 344);
			return '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $matches[1] . '&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $matches[1] . '&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' . $width . '" height="' . $height . '"></embed></object>';
		}
	}
	
	function getVimeo() {
		$matches = array();
		
		// example: http://vimeo.com/127768
		preg_match("#http://(?:www\.)?vimeo\.com/([0-9]+)#i", $this->url, $matches);
		list($width, $height) = $this->calcWH(400, 300);
		
		return '<object width="' . $width . '" height="' . $height . '"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=' . $matches[1] . '&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=' . $matches[1] . '&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="' . $width . '" height="' . $height . '"></embed></object>';
	}
	
	function getMetacafe() {
		$matches = array();
		
		// example: http://www.metacafe.com/watch/2467303/hair_washing_toffee/
		preg_match("#http://(?:www\.)?metacafe\.com/watch/([0-9]+)/([_a-z0-9]+)#i", $this->url, $matches);
		list($width, $height) = $this->calcWH(400, 345);
		
		return '<embed src="http://www.metacafe.com/fplayer/' . $matches[1] . '/' . $matches[2] . '.swf" width="' . $width . '" height="' . $height . '" wmode="transparent" allowFullScreen="true" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"> </embed>';
	}
	
	function getRevver() {
		$matches = array();
		
		// example: http://revver.com/video/1373455/animator-vs-animation-ii-original/
		preg_match("#http://(?:www\.)?revver\.com/video/([0-9]+)#i", $this->url, $matches);
		list($width, $height) = $this->calcWH(480, 392);
		
		return '<object width="' . $width . '" height="' . $height . '" data="http://flash.revver.com/player/1.0/player.swf?mediaId=' . $matches[1] . '" type="application/x-shockwave-flash" id="revvervideoa17743d6aebf486ece24053f35e1aa23"><param name="Movie" value="http://flash.revver.com/player/1.0/player.swf?mediaId=' . $matches[1] . '"></param><param name="FlashVars" value="allowFullScreen=true"></param><param name="AllowFullScreen" value="true"></param><param name="AllowScriptAccess" value="always"></param><embed type="application/x-shockwave-flash" src="http://flash.revver.com/player/1.0/player.swf?mediaId=' . $matches[1] . '" pluginspage="http://www.macromedia.com/go/getflashplayer" allowScriptAccess="always" flashvars="allowFullScreen=true" allowfullscreen="true" height="' . $height . '" width="' . $width . '"></embed></object>';
	}
	
	function getGoogleVideo() {
		$matches = array();
		
		// example: http://video.google.com/videoplay?docid=-8111235669135653751
		preg_match("#http://(?:www\.)?video\.google\.com/videoplay\?docid=(\-[0-9]+)#i", $this->url, $matches);
		list($width, $height) = $this->calcWH(400, 362);
		
		return '<embed id="VideoPlayback" src="http://video.google.com/googleplayer.swf?docid=' . $matches[1] . '&hl=en&fs=true" style="width:400px;height:326px" allowFullScreen="true" allowScriptAccess="always" type="application/x-shockwave-flash"> </embed>';
	}
	
	/* Viddler doesn't use video IDs so there's no apparent way to create embed code...
	function getViddler() {
		$matches = array();
		
		// example: http://www.viddler.com/explore/Powermat/videos/5/
		preg_match("#http://(?:www\.)?revver\.com/video/([0-9]+)/#i", $this->url, $matches);
	
		return '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' . $width . '" height="' . $height . '" id="viddler_45edb989"><param name="wmode" value="transparent" /><param name="movie" value="http://www.viddler.com/player/45edb989/" /><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="true" /><embed src="http://www.viddler.com/player/45edb989/" width="' . $width . '" height="' . $height . '" type="application/x-shockwave-flash" allowScriptAccess="always" allowFullScreen="true" name="viddler_45edb989" wmode="transparent"></embed></object>';
	}
	*/
	
	function getSeesmic() {
		$matches = array();
		
		// example: http://seesmic.com/threads/veyy9lwnnm
		preg_match("#http://(?:www\.)?seesmic\.com/threads/([a-z0-9]+)#i", $this->url, $matches);
		list($width, $height) = $this->calcWH(435, 355);
		
		return "<object width='435' height='355'><param name='movie' value='http://seesmic.com/embeds/wrapper.swf'/><param name='bgcolor' value='#666666'/><param name='allowFullScreen' value='true'/><param name='allowScriptAccess' value='always'/><param name='flashVars' value='video=" . $matches[1] . "&amp;version=threadedplayer'/><embed src='http://seesmic.com/embeds/wrapper.swf' type='application/x-shockwave-flash' flashVars='video=" . $matches[1] . "&amp;version=threadedplayer' allowFullScreen='true' bgcolor='#666666' allowScriptAccess='always' width='435' height='355'></embed></object>";
	}
	
}

add_action('admin_menu', "p75_videoAdminInit");
add_action('save_post', 'p75_saveVideo');

function p75_videoAdminInit() {
	if( function_exists("add_meta_box") ) {
		add_meta_box("p75-video-posting", "Video Options", "p75_videoPosting", "post", "advanced");
	}
}

/**
 * Code for the meta box.
 */
function p75_videoPosting() {
	global $post_ID;
	$videoURL = get_post_meta($post_ID, '_videoembed', true);
	$videoHeight = get_post_meta($post_ID, '_videoheight', true);
	$videoWidth = get_post_meta($post_ID, '_videowidth', true);
	$videoEmbed = get_post_meta($post_ID, '_videoembed_manual', true);
	
?>

	<div style="float:left; margin-right: 5px;">
		<label for="p75-video-url">Video URL: <a href="http://www.press75.com/docs/simple-video-embedder/" title="View Supported Formats" target="_blank">Supported Formats</a></label><br />
		<input style="width: 300px; margin-top:5px;" type="text" id="p75-video-url" name="p75-video-url" value="<?php echo $videoURL; ?>" tabindex='100' />
	</div>
	<div style="float:left; margin-right: 5px;">
		<label for="p75-video-width3">Width:</label><br />
		<input style="margin-top:5px;" type="text" id="p75-video-width3" name="p75-video-width" size="4" value="<?php echo $videoWidth; ?>" tabindex='101' />
	</div>
	<div style="float:left;">
		<label for="p75-video-height4">Height:</label><br />
		<input style="margin-top:5px;" type="text" id="p75-video-height4" name="p75-video-height" size="4" value="<?php echo $videoHeight; ?>" tabindex='102' />
	</div>
	<div class="clear"></div>
	
	<div style="margin-top:10px;">
		  <label for="p75-video-embed">Embed Code: (Overrides Above Settings)</label><br />
		  <textarea style="width: 100%; margin:5px 2px 0 0;" id="p75-video-embed" name="p75-video-embed" rows="4" tabindex="103"><?php echo htmlspecialchars(stripslashes($videoEmbed)); ?></textarea>
	</div>
	<p style="margin:10px 0 0 0;">
		<input id="p75-remove-video" type="checkbox" name="p75-remove-video" /> <label for="p75-remove-video">Remove video</label>
	</p>

<?php
	if ( $videoURL ) {
		echo '<div style="margin-top:10px;">Video Preview: (Actual Size)<br /><div id="video_preview" style="padding: 3px; border: 1px solid #CCC;float: left; margin-top: 5px;">';
		$videoEmbedder = new p75VideoEmbedder($videoURL);
		$videoEmbedder->setDefaultWidth(P75_VIDEO_W);
		$videoEmbedder->setHeight($videoHeight);
		$videoEmbedder->setWidth($videoWidth);
		echo $videoEmbedder->getEmbedCode();
		echo '</div></div><div class="clear"></div>';
	} else if ( $videoEmbed ) {
		echo '<div style="margin-top:10px;">Video Preview: (Actual Size)<br /><div id="video_preview" style="padding: 3px; border: 1px solid #CCC;float: left; margin-top: 5px;">';
		echo stripslashes($videoEmbed);
		echo '</div></div><div class="clear"></div>';
	}
?>
<p style="margin:10px 0 0 0;"><input id="publish" class="button-primary" type="submit" value="Update Post" accesskey="p" tabindex="5" name="save"/></p>
<?php
	if ( $thumbURL )
		echo '<a href="' . $thumbURL . '" title="Preview Video" target="_blank">Preview Video</a>';
}

/**
 * Saves the thumbnail image as a meta field associated
 * with the current post. Runs when a post is saved.
 */
function p75_saveVideo( $postID ) {
	global $wpdb;

	// Get the correct post ID if revision.
	if ( $wpdb->get_var("SELECT post_type FROM $wpdb->posts WHERE ID=$postID")=='revision')
		$postID = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID=$postID");

	// Trim white space just in case.
	$_POST['p75-video-embed'] = trim($_POST['p75-video-embed']);
	$_POST['p75-video-url'] = trim($_POST['p75-video-url']);
	$_POST['p75-video-width'] = trim($_POST['p75-video-width']);
	$_POST['p75-video-height'] = trim($_POST['p75-video-height']);

	if ( $_POST['p75-remove-video'] ) {
		// Remove video
		delete_post_meta($postID, '_videoembed');
		delete_post_meta($postID, '_videowidth');
		delete_post_meta($postID, '_videoheight');
		delete_post_meta($postID, '_videoembed_manual');
	} elseif ( $_POST['p75-video-embed'] ) {
		// Save video embed code.
		if( !update_post_meta($postID, '_videoembed_manual', $_POST['p75-video-embed'] ) )
		add_post_meta($postID, '_videoembed_manual', $_POST['p75-video-embed'] );
		delete_post_meta($postID, '_videoembed');
		delete_post_meta($postID, '_videowidth');
		delete_post_meta($postID, '_videoheight');
	} elseif ( $_POST['p75-video-url'] ) {
		// Save video URL.
		if( !update_post_meta($postID, '_videoembed', $_POST['p75-video-url'] ) )
		add_post_meta($postID, '_videoembed', $_POST['p75-video-url'] );
		delete_post_meta($postID, '_videoembed_manual');
		
		// Save width and height.
		$videoWidth = is_numeric($_POST['p75-video-width']) ? $_POST['p75-video-width'] : "";
		if( !update_post_meta($postID, '_videowidth', $videoWidth) )
		add_post_meta($postID, '_videowidth', $videoWidth);
   
		$videoHeight = is_numeric($_POST['p75-video-height']) ? $_POST['p75-video-height'] : "";
		if( !update_post_meta($postID, '_videoheight', $videoHeight) )
		add_post_meta($postID, '_videoheight', $videoHeight);
	}

}

/**
 * Gets the embed code for a video.
 *
 * @param $postID The post ID of the video
 * @return The embed code
 */
function GetVideo($postID) {
	if ( $videoURL = get_post_meta($postID, 'videoembed', true) ) return $videoURL;
	if ( $videoEmbed = get_post_meta($postID, '_videoembed_manual', true ) ) return $videoEmbed;

	$videoURL = get_post_meta($postID, '_videoembed', true);
	$videoWidth = get_post_meta($postID, '_videowidth', true);
	$videoHeight = get_post_meta($postID, '_videoheight', true);

	$videoEmbedder = new p75VideoEmbedder($videoURL);
	$videoEmbedder->setDefaultWidth(P75_VIDEO_W);
	$videoEmbedder->setWidth($videoWidth);
	$videoEmbedder->setHeight($videoHeight);

	return $videoEmbedder->getEmbedCode();
}




?>