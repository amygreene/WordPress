</div>

<div class="hr">&nbsp;</div>
<div id="footer">
	<p>
	   &copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;<?php _e('Powered by', 'chaoticsoul'); ?> <a href="http://wpmu.org">WordPress MU</a><?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by', 'chaoticsoul'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a><?php } ?>&nbsp;&nbsp;&nbsp;Theme: ChaoticSoul by <a href="http://avalonstar.com" rel="designer">Bryan Veloso</a>. <br />
<?php wp_footer(); ?>
	</p>
</div>
</div>


</body>
</html>
