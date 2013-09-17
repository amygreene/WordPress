
  <div id="footer">
    <div id="footer-top"></div>
	<p>
   &copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?><?php if( SHOW_AUTHORS != 'false') { ?>&nbsp;&nbsp;&nbsp;Theme: Ocean Mist by <a href="http://www.edmerritt.com/" rel="designer">Ed Merritt</a><?php } ?>
   <br />
  <?php if( SHOW_AUTHORS != 'false') { ?><?php _e('Provided by',TEMPLATE_DOMAIN); ?> <a href="http://premium.wpmudev.org" title="WordPress plugins, themes and support">WPMU DEV -The WordPress Experts</a>&nbsp;&nbsp;&nbsp;<?php } ?><?php if(function_exists('get_current_site')) { $current_site = get_current_site();  $current_network_site = get_current_site_name(get_current_site());  ?>
<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a title="<?php echo $current_network_site->site_name; ?>" target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_network_site->site_name; ?></a>
<?php } ?><br />
<?php wp_footer(); ?>
   </p>
  </div>

  </div>
  </div>

  </div>
  </div>

</body>
</html>