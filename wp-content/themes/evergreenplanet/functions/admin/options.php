<?php

$kt =& get_instance();

$kt_counter = array(
	'0' => 'Select a number:'
);

for ($i = 1; $i <= 20; $i++ ) :
	$kt_counter[$i] = $i;
endfor;

$options= array (
	'general' => array (
		array (
			"name" => "Site Logo",
			"desc" => "Replace your site title with a logo, please provide a full path of the image including http://",
			"id" => "site_logo",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Cufón",
			"desc" => "Enable Cufón Fast text replacement",
			"id" => "enable_cufon",
			"standard" => "false",
			"type" => "checkbox"
		),
		array (
			"name" => "Analytics",
			"desc" => "Please paste your Google Analytics (or other) tracking code here.",
			"id" => "analytics",
			"standard" => "",
			"type" => "textarea",
			"class" => "long"
		),
		array (
			"name" => "Theme Stylesheet",
			"desc" => "Please select your colour scheme here.",
			"id" => "alt_stylesheet",
			"standard" => $kt->config->item('default_stylesheet', 'defaults'),
			"type" => "select",
			"options" => $kt->config->item('stylesheet', 'defaults'),
			"class" => "medium"
		),
		array (
			"name" => "Themes Plug-ins Addon",
			"type" => "heading"
		),
		array (
			"name" => "Lifestream",
			"desc" => (function_exists('lifestream') ? 'Installed' : 'Install now from <a href="http://wordpress.org/extend/plugins/lifestream/" target="_blank">Lifestream @ WordPress Plugins</a>'),
			"type" => "html"
		)
	),
	'nav' => array (
		array (
			"name" => "Menu Home Link",
			"desc" => "Display a home link in the category menu.",
			"id" => "home_link",
			"standard" => "true",
			"type" => "checkbox"
		), 
		array (
			"name" => "Menu Home Link Description",
			"desc" => "Enter the text to use as home link.",
			"id" => "home_link_text",
			"standard" => "Home",
			"type" => "text",
			"class" => "medium"
		), 
		array (
			"name" => "Menu Home Link Description",
			"desc" => "Add a description to show under your home link, or leave blank to disable.",
			"id" => "home_link_desc",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		)
	),
	'layout' => array (
		array (
			"name" => "Highlight Posts",
			"desc" => "Select total posts to be highlighted in the home page.",
			"id" => "highlight_posts",
			"standard" => "0",
			"type" => "select",
			"class" => "medium",
			"options" => $kt_counter
		),
		array (
			"name" => "Show Twitter Update",
			"desc" => "Show your Twitter update on the front page",
			"id" => "show_twitter",
			"standard" => "false",
			"type" => "checkbox"
		),
		array (
			"name" => "Twitter Username",
			"desc" => "Twitter Username used to login to Twitter",
			"id" => "twitter_account",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Advanced Option",
			"type" => "heading"
		),
		array (
			"name" => "Custom Home Query",
			"desc" => "Enter your home custom query, please visit <a href='http://codex.wordpress.org/Template_Tags/query_posts' target='_blank'>query_posts</a> for more information.",
			"id" => "home_advanced_query",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		), 
	),
	'optimize' => array (
		array (
			"name" => "jQuery Source",
			"desc" => "Select whether you want to load jQuery from local host or Google CDN.",
			"id" => "jquery_source",
			"standard" => "0",
			"type" => "select",
			"options" => array (
				'0' => 'Local',
				'cdn-google' => 'Google CDN'
			),
			"class" => "medium",
			"args" => array ()
		)
	),
	'ads' => array (
		array (
			"name" => "Banner Ad Sidebar (300x120px)",
			"type" => "heading"
		),
		array (
			"name" => "Enable Ad",
			"desc" => "Enable this ads",
			"id" => "300x120_enable_1",
			"standard" => "false",
			"type" => "checkbox"
		),
		array (
			"name" => "URL",
			"id" => "300x120_url_1",
			"desc" => "Enter the URL for this banner ad.",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Image",
			"id" => "300x120_img_1",
			"desc" => "Enter the URL where this banner ad points to.",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Adsense code",
			"id" => "300x120_html_1",
			"desc" => "Enter your adsense code here.",
			"standard" => "",
			"type" => "textarea",
			"class" => "long"
		),
		array (
			"name" => "Enable Ad",
			"desc" => "Enable this ads",
			"id" => "300x120_enable_2",
			"standard" => "false",
			"type" => "checkbox"
		),
		array (
			"name" => "URL",
			"id" => "300x120_url_2",
			"desc" => "Enter the URL for this banner ad.",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Image",
			"id" => "300x120_img_2",
			"desc" => "Enter the URL where this banner ad points to.",
			"standard" => "",
			"type" => "text",
			"class" => "long"
		),
		array (
			"name" => "Adsense code",
			"id" => "300x120_html_2",
			"desc" => "Enter your adsense code here.",
			"standard" => "",
			"type" => "textarea",
			"class" => "long"
		)
	)
);

