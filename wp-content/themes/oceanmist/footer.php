
  <div id="footer">
    <div id="footer-top"></div>
	<p>
   &copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;Theme: Ocean Mist by <a href="http://www.edmerritt.com/" rel="designer">Ed Merritt</a>
   <br />
  <?php _e('Powered by',TEMPLATE_DOMAIN); ?> <a href="http://wpmu.org">WordPress MU</a><?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
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