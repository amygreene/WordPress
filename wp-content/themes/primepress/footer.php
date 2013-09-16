	<div id="footer">

		<p class="left">&#169; <?php echo date('Y');?> <strong><?php bloginfo('name'); ?></strong> | <?php _e("Powered by");?> <a href="http://wpmu.org">WPMU</a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?> <?php _e('Hosted by', 'primepress'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>.
<?php } ?></p>

		<p class="right">A <strong><a href="http://www.techtrot.com/primepress/" title="PrimePress theme homepage">WordPress theme</a></strong> by <strong><a href="http://www.techtrot.com" title="PrimePress author homepage">Ravi Varma</a></strong></p>

	</div><!--#footer-->



</div><!--#container-->	

	

<div class="clear"></div>	

</div><!--#page-->

<?php wp_footer(); ?>

</body>

</html>