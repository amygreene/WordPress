<?php
/*
Plugin Name: Customize Meta Widget
Plugin URI: http://jehy.ru/wp-plugins.en.html
Description: Add or remove links from meta widget, especially sometimes annoying link to wordpress.org.
Author: Jehy
Version: 0.2
Min WP Version: 2.6
Max WP Version: 4.0
Author URI: http://jehy.en.html

########   PLEASE GO DOWN TO EDIT THE CONTENT OF META WIDGET     #############
*/
function replace_meta_widget()
{
unregister_sidebar_widget ('meta');
$widget_ops = array('classname' => 'widget_meta', 'description' => __( "Log in/out, admin, feed and WordPress links") );
wp_register_sidebar_widget('meta', __('Meta'), 'wp_widget_meta_modified', $widget_ops);
}

add_action('widgets_init',replace_meta_widget);

function wp_widget_meta_modified($args) {
	extract($args);
	$options = get_option('widget_meta');
	$title = empty($options['title']) ? __('Admins') : apply_filters('widget_title', $options['title']);
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title;
#WIDGET BEGINS HERE. PLEASE EDIT AS MUCH AS YOU WANT
?>
			<ul>
				 <?php
				 switch_to_blog(1);
				 $site_title = get_bloginfo( 'name' );
				 $site_url = network_site_url( '/' );
				 restore_current_blog();
					?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php echo get_admin_url(); ?>">Dashboard</a></li>
			<li><a href="<?php echo $site_url?>"><?php echo $site_title; ?></a></li> 
		
		
			<li>
			<?php wp_meta(); ?>
			</ul>
		<?php
#WIDGET ENDS HERE.
echo $after_widget; 

}
?>