</div><?php //closing for #main?>
<div id="footer">
  <?php // Please leave the footer credits intact ?>
	<p><strong><?php bloginfo('name');?></strong> Copyright &copy; <?php echo date('Y');?> All Rights Reserved.&nbsp;&nbsp;&nbsp;<?php _e('Powered by', TEMPLATE_DOMAIN); ?> <a href="http://wpmu.org">WPMU</a><?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>&nbsp;&nbsp;&nbsp;<?php _e('Hosted by', TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
       <br />
        <?php wp_footer();?>
    </p>

</div>

</body>
</html>
