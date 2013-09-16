



<div id="footer">

	<p>

<?php _e('Theme: Contempt by','contempt'); ?> <a href="http://www.vault9.net" rel="designer">Vault9</a>.
<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;&nbsp;<?php _e('Hosted by', 'contempt'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?> <br />
      	<?php wp_footer(); ?>
	</p>

</div>



</div>







</body>

</html>

