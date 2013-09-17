<?php
	// paths
	// -----
	$path_theme = get_template_directory_uri();
	$path_images = $path_theme.'/images/';
	$path_rainbow_images = $path_theme.'/functions/moorainbow/images/';
	
  // Preset font sizes
	$font_sizes = array('11','12','13','14','15','16', '18', '19', '21');
	
	// control's types
	// ---------------
	$control_types = array(
		0 => 'background-color',
		1 => 'background-image',
		2 => 'color',
		3 => 'color:hover',
		4 => 'font-size',
		5 => 'select-custom'
	);
	
	// sections controls
	// -----------------
	$sections_controls = array(
    array('preset', 'title' => __('Preset Color scheme.', 'delicate')),
    array('header', 'title' => __('Header Navigation.', 'delicate')),
    array('main', 'title' => __('Text and Link styles.', 'delicate')),
    array('sidebar', 'title' => __('Sidebar.', 'delicate')),
	);
	
	$root_block = 'background-image-div';
	
	// controls
	// --------
	$controls = array(
  $controls[] = array(
			'name' => 'paramspresetStyle',
			'title' => __('Preset Color scheme','delicate'),
			'section' => $sections_controls[0], // Manage your template color scheme
			'type' => $control_types[5],
			'associated' => array(
          __('Delicate default style', 'delicate') => 'style0',
          __('Custom style', 'delicate') => 'custom'
       ),
			'default' => 'style0'
	),
	
	$controls[] = array(
			'name' => 't_nav_font_size',
			'title' => __('Navigation - Font size', 'delicate'),
			'section' => $sections_controls[1], // Top navigation.
			'type' => $control_types[4],
			'selector' => '.topnav a',
			'selector-mini' => '#nav a',
			'sizes' => array('14' => 14, '16' => 16, '17' => 17, '18' => 18, '19' => 19, '21' => 21),
			'default' => '17'
		),	
	$controls[] = array(
			'name' => 't_nav_link_color',
			'title' => __('Navigation - Link color', 'delicate'),
			'section' => $sections_controls[1], // Top navigation.
			'type' => $control_types[2],
			'selector' => '.topnav a',
			'selector-mini' => '#nav a',
			'default' => '454545'
		),
	$controls[] = array(
			'name' => 't_nav_linkactive_color',
			'title' => __('Navigation - Link hover (highlight)', 'delicate'),
			'section' => $sections_controls[1], // Top navigation.
			'type' => $control_types[3],
			'selector' => '.topnav a:hover, .topnav ul.children > li > a:hover, .topnav ul.children > li > a:hover span',
			'selector-mini' => '#nav a',
			'color-control' => 't_nav_link_color',
			'default' => 'ff0505'
		),	
		
		
  $controls[] = array(
			'name' => 't_font_size',
			'title' => __('Main - Font size', 'delicate'),
			'section' => $sections_controls[2], // Top navigation.
			'type' => $control_types[4],
			'selector' => 'body',
			'selector-mini' => '#background-image-div',
			'sizes' => array('12' => 12, '13' => 13, '14' => 14, '16' => 16, '18' => 18, '19' => 19, '21' => 21),
			'default' => '13'
		),
  $controls[] = array(
			'name' => 't_text_color',
			'title' => __('Main - Text color', 'delicate'),
			'section' => $sections_controls[2], // Top navigation.
			'type' => $control_types[2],
			'selector' => '.post',
			'selector-mini' => '#test-text',
			'default' => '4D4D4F'
		),
	$controls[] = array(
			'name' => 't_link_color',
			'title' => __('Main - Link color', 'delicate'),
			'section' => $sections_controls[2], // Top navigation.
			'type' => $control_types[2],
			'selector' => '.post a',
			'selector-mini' => '#test-text a',
			'default' => '0E73B8'
		),
	$controls[] = array(
			'name' => 't_linkactive_color',
			'title' => __('Main - Link hover (highlight)', 'delicate'),
			'section' => $sections_controls[2], // Top navigation.
			'type' => $control_types[3],
			'selector' => '.post a:hover',
			'selector-mini' => '#test-text a',
			'color-control' => 't_link_color',
			'default' => 'ff0505'
		),
	$controls[] = array(
			'name' => 't_side_text_color',
			'title' => __('Sidebar - Text color', 'delicate'),
			'section' => $sections_controls[3], // Top navigation.
			'type' => $control_types[2],
			'selector' => '#sidebar li.widget, #sidebar h2',
			'selector-mini' => '#sidebar',
			'default' => '454547'
		),	
	$controls[] = array(
			'name' => 't_side_link_color',
			'title' => __('Sidebar - Link color', 'delicate'),
			'section' => $sections_controls[3], // Top navigation.
			'type' => $control_types[2],
			'selector' => '#sidebar li.widget a',
			'selector-mini' => '#sidebar a',
			'default' => '4D4D4F'
		),
	$controls[] = array(
			'name' => 't_side_linkactive_color',
			'title' => __('Sidebar - Link hover (highlight)', 'delicate'),
			'section' => $sections_controls[3], // Top navigation.
			'type' => $control_types[3],
			'selector' => '#sidebar li.widget a:hover',
			'selector-mini' => '#sidebar a',
			'color-control' => 't_side_link_color',
			'default' => '0E73B8'
		),	
		
	);
?>