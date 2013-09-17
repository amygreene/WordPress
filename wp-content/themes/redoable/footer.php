	<div class="clear"></div>
</div> <!-- Close Page -->

<hr />

<div id="footer"><!-- UNSLEEPABLE FOOTER -->
	<div id="footer_content">
		<div id="footer_middle">
     		<div id="footer_images">

     		</div>
   		
		<!-- spacer -->
		<div id="copyright"><p>&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?></p></div>
			<small><?php _e('Powered by',TEMPLATE_DOMAIN); ?> <a href="http://wpmu.org">WordPress MU</a>&nbsp;&nbsp;&nbsp;Theme: Redoable by <a href="http://www.deanjrobinson.com/" rel="designer">Dean J Robinson</a><?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>&nbsp;&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>&nbsp;&nbsp;&nbsp;
<?php } ?>
   			</small>
	<?php wp_footer(); ?>
		</div>
	</div>
</div><!-- END UNSLEEPABLE FOOTER -->



</body>
</html> 
