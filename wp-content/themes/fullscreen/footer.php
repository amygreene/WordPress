<br class="clear" />
</div>
<div id="footer-wrap">
<div id="footer">
<div class="span-3 append-1 small">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Left') ) : ?>
<?php endif; ?>
</div>
<div class="column span-3 append-1 small">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Middle') ) : ?>
<?php endif; ?>
</div>
<div class="column span-10 append-1 small">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-Right') ) : ?>
<?php endif; ?>
</div>
<div class="column span-5 small last">
<h6 class="sub">Credits</h6>
<p class="quiet">
        <div class="icon"><a href="http://graphpaperpress.com"><span class="ui-icon ui-icon-power"></span>Design by Graph Paper Press</a></div><br class="clear" />
        <div class="icon"><a href="http://wordpress.org"><span class="ui-icon ui-icon-gear"></span>Powered by Wordpress</a></div><br class="clear" />
		<div class="icon"><a href="<?php bloginfo('rss2_url'); ?>"><span class="ui-icon ui-icon-signal-diag"></span>Subscribe</a></div><br class="clear" />
		<div class="icon"><a href="<?php bloginfo('comments_rss2_url'); ?>"><span class="ui-icon ui-icon-signal-diag"></span>Comments</a></div><br class="clear" />
		<div class="icon"><a href="<?php bloginfo('home'); ?>/" title="Home"><span class="ui-icon ui-icon-key"></span>Copyright <?php echo date("Y"); ?>, <?php bloginfo('name'); ?></a></div><br class="clear" />
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
</p>
</div>
<br class="clear" />
</div>
</div>
<?php wp_footer(); ?>

</body>
</html>