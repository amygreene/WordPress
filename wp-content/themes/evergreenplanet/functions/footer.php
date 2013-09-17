<?php

function kreative_wp_foot()
{
	$kt =& get_instance();
	echo $kt->config->item('analytics', 'general');
	kreative_loadjs_twitter();
	
	?>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/tab.js"></script>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.fieldtag.min.js"></script>
	
	<script type="text/javascript">
	<!--
	jQuery(function($){
	    //snip
		$("#author,#url,#email,#comment").fieldtag();
	    //snap
	});
	-->
	</script>
	<?php 
}

function kreative_loadjs_twitter() {
	$kt =& get_instance();
	if ($kt->config->item('show_twitter', 'layout') == 'true' && trim($kt->config->item('twitter_account', 'layout')) != '')
	{
		echo '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';  
		echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/';
		echo $kt->config->item('twitter_account', 'layout');
		echo '.json?callback=twitterCallback2&amp;count=1";?>></script>';
	}
}

add_action('wp_footer', 'kreative_wp_foot');