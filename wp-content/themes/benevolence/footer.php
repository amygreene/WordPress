	</div>



<div id="footer">

<a class="footerLink" href="http://www.thoughtmechanics.com/blog/2005/01/03/benevolence/" rel="designer">Benevolence</a> <?php _e('theme by Theron Parlin.','benevolence'); ?>

<br /><?php _e('Syndicate entries using','benevolence'); ?> <a class="footerLink" href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS','benevolence'); ?>">

   <abbr title="Really Simple Syndication">RSS</abbr></a> <?php _e('and','benevolence'); ?> <a class="footerLink" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)','benevolence'); ?></a>. <?php _e('This theme contains valid','benevolence'); ?> <a class="footerLink" href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional','benevolence'); ?>"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> <?php _e('and','benevolence'); ?> <a class="footerLink" href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>. Powered by <a href="http://wordpressmu.org">WordPress MU</a>.<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by', 'benevolence'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>

<br /><br />

</div>



</div>



<?php wp_footer(); ?>



</body>

</html>

