<?php
	// control's types
	// ---------------
	$control_types = array(
		0 => 'textarea',
		1 => 'input',		
		2 => 'select-bool',		
		3 => 'select',
		4 => 'multi-select',
		5 => 'upload',
		6 => 'sort-item'
	);
	
	// sections controls
	// -----------------
	$sections_controls = array(
    array('general', 'title' => __('General Options', 'delicate')),
    array('front_page', 'title' => __('Front Page Settings', 'delicate')),
		array('social_profiles', 'title' => __('Social Profiles & Tracking', 'delicate')),
	);
	
	// Preset boolean
	$boolean_var[] = array( "yes", "Yes" );
	$boolean_var[] = array( "no", "No" );
	
	// Numbers
	$num_data = array ('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19');

	
	// controls
	// --------
	$tcontrols = array();
	
	$tcontrols[] = array (
			'name' => 'nattywp_custom_logo',					// id for control
			'title' => __('Custom Logo', 'delicate'),				// Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[5],				// Type -> see $control_types array	
			'desc' => __('Default logo can be replaced by your custom logo image.', 'delicate'),
			'default' => ''		
		);	
	$tcontrols[] = array (
			'name' => 'nattywp_custom_favicon',
			'title' => __('Custom Favicon.ico upload', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[5],
			'btn_name' => __('Upload .ICO file', 'delicate'),
			'desc' => __('Use <a href="http://www.faviconer.com" target="_blank">Faviconer.com</a> to create unique favicon.ico image.', 'delicate'),
			'default' => ''
	);
	$tcontrols[] = array (
			'name' => 't_home_name',
			'title' => __('Home Link Text', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[1],
			'desc' => __('Enter a Home link text for breadcrumbs navigation.', 'delicate'),
			'default' => 'Home'
		);
	$tcontrols[] = array (
			'name' => 't_meta_desc',					// id for control
			'title' => __('Meta Description', 'delicate'), // Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[0],				// Type -> see $control_types array	
			'desc' => __('Enter a blurb about your site here, and it will show up on the &lt;meta name=&quot;description&quot;&gt; tag. Useful for SEO. <br/><br/>Just plain text, all HTML tags will be removed.', 'delicate'),
			'filter' => 'nohtml',
			'default' => ''		
		);	

	$tcontrols[] = array (
			'name' => 't_cufon_replace',
			'title' => __('Enable Cufon font replacement', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[2],
			'mode' => 'bool',
			'desc' => __('Cufon performs text replacement on web pages, using the canvas element to render fancy typefaces.', 'delicate'),
			'default' => 'yes'
		);
	$tcontrols[] = array (
			'name' => 't_cufon_replace',
			'title' => __('Cufon font replacement', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[3],			
			'associated' => array(
          __('Enable Cufon font replacement', 'delicate') => 'yes',
          __('Disable (for non-latin characters)', 'delicate') => 'disable',
       ),
			'desc' => __('Cufon performs text replacement on web pages, using the canvas element to render fancy typefaces.<br/><br/><strong>Note:</strong> Cufon works only with latin characters. Disable Cufon if you use <strong>Non-latin</strong> font types.', 'delicate'),
			'default' => 'yes'
		);	
	$tcontrols[] = array (
			'name' => 't_show_post',
			'title' => __('Show Fullposts?', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[2],
			'mode' => 'bool',
			'desc' => __('Show fullposts instead of post summary?', 'delicate'),
			'default' => 'yes'
		);
	$tcontrols[] = array (
			'name' => 't_show_search',
			'title' => __('Header Search Form', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[3],			
			'associated' => array(
          __('Display header Search Form', 'delicate') => 'yes',
          __('Disable Search Form', 'delicate') => 'disable',
       ),
			'desc' => __('Turn on/off the header searchform', 'delicate'),
			'default' => 'yes'
		);
	$tcontrols[] = array (
			'name' => 't_show_sidebar',
			'title' => __('Sidebar Align', 'delicate'),
			'section' => $sections_controls[0],
			'type' => $control_types[3],			
			'associated' => array(
          __('Align to the Left', 'delicate') => 'toleft',
          __('Align to the Right', 'delicate') => 'no',
          __('Disable Sidebar on all pages', 'delicate') => 'disable',
       ),
			'desc' => __('This property helps you to align the sidebar on the left instead of the right.', 'delicate'),
			'default' => 'no'
		);
		
		
	 $tcontrols[] = array (
			'name' => 't_head_width',
			'title' => __('Header image Width', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[1],
			'desc' => __('Change default custom header image width (970px). <strong>You need to reupload images after changing this property.</strong>', 'delicate'),
			'field_class' => 'array',
			'filter' => 'num',
			'default' => '970'		
		);	
  $tcontrols[] = array (
			'name' => 't_head_height',
			'title' => __('Header image Height', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[1],
			'desc' => __('Change default custom header image height (225px). <strong>If you use Custom Header you need to reupload images after changing this property.</strong>', 'delicate'),
			'field_class' => 'array',
			'filter' => 'num',
			'default' => '225'		
		);	
		
	$tcontrols[] = array (
			'name' => 't_show_slideshow',
			'title' => __('Header Area Settings', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[3],			
			'associated' => array(
          __('Turn Off Header section', 'delicate') => 'hide',
          __('Display Header Image', 'delicate') => 'yes',
          __('Display Page Slideshow', 'delicate') => 'pag',
       ),
			'desc' => __('This option helps you to control your header area. Select: <br/>
			<strong>Turn Off Header section</strong> - to completely remove header area from display.<br/>
			<strong>Header Image</strong> - to display <a href="?page=custom-header">Uploaded Header</a>.<br/>
			<strong>Page Slideshow</strong> - to create a Page-based slider with Featured images.', 'delicate'),
			'default' => 'pag'
		);			 
	$tcontrols[] = array (
			'name' => 't_scroll_pages',
			'name_get' => 't_scroll_pages[]',
			'title' => __('Header Area - Page Slideshow', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[6],	
			'desc' => __('<strong>Note:</strong> Please make sure that you selected <i>"Display Page Slideshow"</i> option under <strong>Header Area Settings</strong>.<br/> To add pages click on the "Plus" icon at the right side. To order pages click and move item at the left side.', 'delicate'),
			'filter' => 'multi',
			'default' => 'no'
		);		
	$tcontrols[] = array (
			'name' => 't_slide_effect',
			'title' => __('Slideshow effect', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[3],			
			'associated' => array(
			'blindX' => 'blindX',
			'blindY' => 'blindY',
			'blindZ' => 'blindZ',
			'cover' => 'cover',
			'curtainX' => 'curtainX',
			'curtainY' => 'curtainY',
      'fade' => 'fade',
      'fadeZoom' => 'fadeZoom',
      'growX' => 'growX',
      'growY' => 'growY',
      'none' => 'none',
      'scrollUp' => 'scrollUp',
      'scrollDown' => 'scrollDown',
			'scrollLeft' => 'scrollLeft',
      'scrollRight' => 'scrollRight',
      'scrollHorz' => 'scrollHorz',
      'scrollVert' => 'scrollVert',
      'shuffle' => 'shuffle',
      'slideX' => 'slideX',
      'slideY' => 'slideY',
      'toss' => 'toss',
      'turnUp' => 'turnUp',
      'turnDown' => 'turnDown',
      'turnLeft' => 'turnLeft',
      'turnRight' => 'turnRight',
      'uncover' => 'uncover',
      'wipe' => 'wipe',
      'zoom' => 'zoom'
	),
			'desc' => __('Select transition effect for homepage slideshow.', 'delicate'),
			'default' => 'fade'
		);		
  $tcontrols[] = array (
			'name' => 't_timeout',
			'title' => __('Timeout', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[1],
			'desc' => __('Milliseconds between slide transitions (0 to disable auto advance)', 'delicate'),
			'field_class' => 'array',
			'filter' => 'num',
			'default' => '6000'		
		);	
  $tcontrols[] = array (
			'name' => 't_slide_speed',
			'title' => __('Slide speed', 'delicate'),
			'section' => $sections_controls[1],
			'type' => $control_types[1],
			'desc' => __('Speed of the transition (in milliseconds)', 'delicate'),
			'field_class' => 'array',
			'filter' => 'num',
			'default' => '1000'		
		);
		
	
	$tcontrols[] = array (
			'name' => 't_twitterurl',				// id for control
			'title' => __('Twitter URL', 'delicate'),				// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[1],				// Type -> see $control_types array	
			'desc' => __('Link to your twitter page. Start with http://', 'delicate'),
			'filter' => 'url',
			'default' => 'http://twitter.com/nattywp'
		);
	$tcontrols[] = array (
			'name' => 't_facebookurl',				// id for control
			'title' => __('Facebook URL', 'delicate'),				// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[1],				// Type -> see $control_types array	
			'desc' => __('Link to your facebook page. Start with http://', 'delicate'),
			'filter' => 'url',
			'default' => 'http://www.facebook.com/faviconer'		
		);		
	$tcontrols[] = array (
			'name' => 't_feedburnerurl',				// id for control
			'title' => __('Feedburner URL', 'delicate'),				// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[1],				// Type -> see $control_types array	
			'desc' => __('<a href="http://feedburner.google.com" target="_blank">Feedburner</a> URL. This will replace RSS feed link. Start with http://', 'delicate'),
			'filter' => 'url',
			'default' => ''
		);
	$tcontrols[] = array (
			'name' => 't_tracking',					// id for control
			'title' => __('Tracking Code', 'delicate'),					// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[0],				// Type -> see $control_types array	
			'desc' => __('Put your tracking code here and manage your website statistics. <br /><br /><strong>Note:</strong> JS code including <i>&lt;script&gt;...&lt;/script&gt; tags</i>', 'delicate'),
			'default' => ''		
		);	
?>