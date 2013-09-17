</div>

<div id="footer">
<?php _e('Theme: Ambiru by','ambiru'); ?> <a href="http://ifelse.co.uk" rel="designer">Phu</a>. Powered by <a href="http://wordpressmu.org">WordPress MU</a>.<br />
<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', 'ambiru'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
<br />
<?php wp_footer(); ?>

</div>

