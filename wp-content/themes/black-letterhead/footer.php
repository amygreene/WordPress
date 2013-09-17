<hr />
<div id="footer">
	<p class="center">
		&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;Powered by <a href="http://wpmu.org">WordPress MU</a>.<br>

       <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by','black-letterhead'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?><br />

		<!-- 
		<br /><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)');?></a>
		<?php _e('and ');?> <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)');?></a>. 
		<?php echo $wpdb->num_queries; ?> <?php _e('queries','black-letterhead');?>. -->
		<?php /*timer_stop(1); ?> <?php _e('seconds','black-letterhead');*/ ?>
	</p>
</div>
</div>

<!-- Design by Robin Hastings - http://www.rhastings.net/ -->
<!-- Colors modified by Ulysses Ronquillo - http://ulyssesonline.com/ -->

		<?php do_action('wp_footer'); ?>

</body>
</html>