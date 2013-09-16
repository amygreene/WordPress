<?php
function natty_sidebar_init() {
	register_sidebar(array(
		'name' => __('Sidebar (Main)', 'delicate'),
		'before_widget' => '<li id="%2$s" class="widget png_scale">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="blocktitle"><span>',
    'after_title' => '</span></h2>'
  ));	
	register_sidebar(array(
		'name' => __('Sidebar (Inner Page/Post)', 'delicate'),
		'description'   => __('Add widgets for single Page and Post. Displaying Sidebar (Main) if empty.', 'delicate'),
		'before_widget' => '<li id="%2$s" class="widget png_scale">',
    'after_widget' => '</li>',
    'before_title' => '<h2 class="blocktitle"><span>',
    'after_title' => '</span></h2>'
  ));
}

add_action( 'widgets_init', 'natty_sidebar_init' );
?>