	<div id="footer">
		<p>&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp; &mdash; <a href="http://cutline.tubetorial.com/">Cutline</a> by <a href="http://www.tubetorial.com">Chris Pearson</a><br />Powered by <a href="http://wordpressmu.org">WordPress MU</a>
<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Hosted by', 'cutline'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?><br /><?php wp_footer(); ?> 
</p>

	</div>
</div>

</body>
</html>