
<div id="footer-widget">
<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
<?php endif; ?>
</ul>
</div>




<div id="footer">

All content is &copy; <?php echo gmdate('Y'); ?> <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;All rights reserved.


<p id="footer-credit">

<span id="generator-link">
<a href="http://wpmu.org"><?php _e('WordPress MU', 'sandbox'); ?></a>
</span>

<span class="meta-sep">|</span>

<span id="theme-link">
<a href="http://www.plaintxt.org/themes/sandbox/"><?php _e('Sandbox', 'sandbox'); ?></a>
</span>

<span class="meta-sep">|</span>

<a href="http://www.allancole.com/wordpress/themes/autofocus"><?php _e('Autofocus', 'sandbox'); ?></a>


<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<span class="meta-sep">|</span>
<?php _e('Hosted by', 'sandbox'); ?> <a href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>


</p>

<?php wp_footer(); ?>

</div><!-- #footer -->
</div><!-- #wrapper .hfeed -->



</body>
</html>