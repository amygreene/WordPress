</div>

<div id="footer">

	<div id="miscellany">
	
	<?php if (function_exists('dynamic_sidebar')) { echo "<div class=\"widgets\">\n"; } ?>

	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets')) :  // Footer widgets ?>

		<?php if (!is_search()) { include (TEMPLATEPATH . "/searchform.php"); } ?>

	<?php endif; // end widgets if ?>
	
	<?php if (function_exists('dynamic_sidebar')) { echo "</div>\n"; } ?>

	</div>


	<div id="about">
		<div class="navigation">
		<?php $_SERVER['REQUEST_URI']  = preg_replace("/(.*?).php(.*?)&(.*?)&(.*?)&_=/","$2$3",$_SERVER['REQUEST_URI']); ?>
			<div class="left"><?php next_posts_link('<span>&laquo;</span> '.__('Previous Entries','').''); ?></div>
			<div class="right"><?php previous_posts_link(''.__('Next Entries','').' <span>&raquo;</span>'); ?></div>
		</div>		
	</div>


	<div id="theme-info">
		<div class="primary content">
			<p>&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?><br />
            <a href="http://tarskitheme.com/">Tarski Theme</a> by Ben Eastaugh and Chris Sternal-Johnson.<br />
<?php _e("Powered by",TEMPLATE_DOMAIN); ?> <a href="http://wordpressmu.org">WordPress MU</a>.<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a><?php } ?><br /><?php wp_footer(); ?></p>
		</div>
		<div class="secondary">
			<p><a class="feed" title="<?php _e('Subscribe to the');?> <?php bloginfo('name'); ?> feed" href="<?php echo get_bloginfo_rss('rss2_url'); ?>">Subscribe to feed.</a></p>
		</div>
	</div>

</div>

</div></body></html>
