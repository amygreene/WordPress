<p id="footer">Theme: Connections by <a href="http://www.vanillamist.com" rel="designer">www.vanillamist.com</a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', 'connections'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?><br /><?php wp_footer(); ?></p>





