<?php

if ( function_exists('register_sidebar') ) // Sidebar Widget
            register_sidebar(array(
        'name' => 'Bottom-Left',
        'before_widget' => '<div class="item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="sub">',
        'after_title' => '</h6>',
    ));
            register_sidebar(array(
        'name' => 'Bottom-Middle',
        'before_widget' => '<div class="item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="sub">',
        'after_title' => '</h6>',
    ));
            register_sidebar(array(
        'name' => 'Bottom-Right',
        'before_widget' => '<div class="item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="sub">',
        'after_title' => '</h6>'
    ));

?>