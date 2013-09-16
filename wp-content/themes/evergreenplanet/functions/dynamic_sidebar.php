<?php 

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li class="widgets">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="mainhead">',
		'after_title' => '</h2>',
	));
}