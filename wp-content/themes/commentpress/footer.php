	<br class="clear">
	<div id="footer">
		<div class="divider" style="margin-left: -25px;"></div>
		<br />
		<a href="<?php bloginfo('url'); ?>"><?php _e('Home');?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php bloginfo('url');?><?php _e('/about/');?>"><?php _e('About');?></a>&nbsp;&nbsp;<!--|&nbsp;&nbsp;<a href="<?php bloginfo('url'); ?>/privacy/">Privacy Policy</a>&nbsp;&nbsp;--><br />
		This site uses <a href="http://www.futureofthebook.org/commentpress/">CommentPress</a> (version <?= commentpress_version(); ?>),<br />a project of the <a href="http://www.futureofthebook.org">Institute for the Future of the Book</a>.<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a><?php } ?>
		<br class="clear">
	</div>
</div> 
</body>
</html>

