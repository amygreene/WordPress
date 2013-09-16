<?php $current_site = get_current_site(); ?>


<div id="footer">


  
<?php _e('Powered by');?> <a href="http://wordpressmu.org">WordPress MU</a> &amp; <?php _e('designed by');?> <a href="http://vaguedream.com/">Stephen Reinhardt</a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', 'blue-moon'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
<br />
<?php wp_footer(); ?>


</div>


</div>





</body></html>


