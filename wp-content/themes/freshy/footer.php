
<hr style="display:none"/>

<div id="footer">
	<small class="footer_content">
   &copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;<?php _e('Powered by', TEMPLATE_DOMAIN); ?> <a href="http://wp.mu">WPMU</a><br />
	<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>Theme: Freshy by <a href="http://www.jide.fr/">Jide</a>
	</small>
<?php wp_footer(); ?>
</div>

</div> <!--- end of the <div id="page"> (from header.php) -->

</body>
</html>

		
