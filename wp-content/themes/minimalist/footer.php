

</div>
</div>


<small><?php _e("Powered by");?> <a href="http://wpmu.org">WPMU</a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', 'minimalist'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>.
<?php } ?><br />
<?php wp_footer(); ?> 
</small>
</body>
</html>