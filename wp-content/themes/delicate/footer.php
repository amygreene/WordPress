<?php 
$t_twitterurl = nattywp_get_option("t_twitterurl");
$t_facebookurl = nattywp_get_option("t_facebookurl");
$t_feedburnerurl = nattywp_get_option("t_feedburnerurl");
?>
<div id="footer">
<div class="lt">
  <?php printf(__('Copyright &copy; %s All rights reserved.','delicate'), date('Y')); ?>
  <ul class="social">
    <?php if ($t_feedburnerurl != '' && $t_feedburnerurl != 'no') {?>
      <li id="rss"><a class="ss png_crop" href="<?php echo $t_feedburnerurl; ?>"></a></li>
    <?php } else { ?>
      <li id="rss"><a class="ss png_crop" href="<?php bloginfo('rss2_url'); ?>"></a></li>
    <?php } ?>
    <?php if($t_facebookurl != ''){ if($t_facebookurl == 'no') $t_facebookurl = 'http://www.facebook.com';?><li id="fb"><a class="ss png_crop" href="<?php echo $t_facebookurl; ?>"></a></li><?php } ?>
    <?php if($t_twitterurl != ''){ if($t_twitterurl == 'no') $t_twitterurl = 'http://twitter.com/nattywp';?><li id="tw"><a class="ss png_crop" href="<?php echo $t_twitterurl; ?>"></a></li><?php } ?>
  </ul>
</div>
<div class="rt"><?php _e('Designed by','delicate');?> <a href="http://www.nattywp.com" title="NattyWP"><img src="<?php echo get_template_directory_uri(); ?>/images/natty-logo.png" width="82" height="17" valign="3px" class="png" alt="NattyWP" align="middle" /></a></div>		
<div class="clear"></div>			
</div>
</div> <!-- END Columns --> 
</div><!-- END main -->
</div>  
<div class="clear"></div>

<?php wp_footer(); ?>   
</body>
</html>