<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes
// 
// define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
// define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
// define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
// define('THEMATIC_COMPATIBLE_FEEDLINKS', true);

// filter thematic_create_stylesheet to implement your own stylesheets
function my_stylesheet($content) {
    // We test if we're on a 2col template page
  if (is_page_template( 'template-2col.php' ) ) {
    // yes, we are .. now let's load the 2c-fixed layout
        $content = "\t";
        $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        $content .= get_bloginfo('stylesheet_directory') . "/style-2col.css";
        $content .= "\" />";
        $content .= "\n\n";
  } else {
    // we are not .. let's load the 3c-r-fixed layout
        $content = "\t";
        $content .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        $content .= get_bloginfo('stylesheet_directory') . "/style.css";
        $content .= "\" />";
        $content .= "\n\n";
    }
        // $content will be handed back to thematic_create_stylesheet
    return $content;
}
// connect the filter to thematic_create_stylesheet
add_filter ('thematic_create_stylesheet', 'my_stylesheet');

?>