<div id="footer">
&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;Theme: Solipsus by <a href="http://nuwen.com/" rel="designer">Nuwen.Com</a>.<br />
<?php _e('Powered by',TEMPLATE_DOMAIN); ?> <a href="http://wpmu.org">WordPress MU</a><?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
<br /><?php wp_footer(); ?>
</div>

</div>
</div>

</div>


</body>
</html>
