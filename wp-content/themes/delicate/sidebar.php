<ul>
<?php if ( !dynamic_sidebar() ) : ?>							
<li class="widget png_scale" id="categories_id">
 <h2 class="blocktitle"><span><?php _e('Categories', 'delicate'); ?></span></h2>	
 <ul>
<?php wp_list_categories('orderby=name&show_count=1&hide_empty=0&depth=1&title_li='); ?>
</ul>		
</li>
<li class="widget png_scale" id="text_id">
<h2 class="blocktitle"><?php _e('Archive', 'delicate'); ?></h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<li>
    
<li class="widget png_scale" id="meta">
<h2 class="blocktitle"><?php _e('Meta', 'delicate'); ?></h2>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li class="rss"><?php $t_feedburnerurl = nattywp_get_option('t_feedburnerurl'); if ($t_feedburnerurl == '' || $t_feedburnerurl == 'no') {?>
    <a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Read in RSS', 'delicate'); ?></a>
  <?php } else { ?>
    <a href="<?php echo $t_feedburnerurl ?>"><?php _e('Read in RSS', 'delicate'); ?></a>
   <?php } ?>

</li>
<?php if(nattywp_get_option('t_twitterurl') != '') { ?>
<li class="twitter"><a href="<?php $t_twitterurl = nattywp_get_option('t_twitterurl'); if ($t_twitterurl == 'no') { $t_twitterurl = 'http://twitter.com/nattywp'; } echo $t_twitterurl; ?>" title="<?php _e('Twitter profile', 'delicate'); ?>"><?php _e('Twitter', 'delicate'); ?></a></li>
<?php } ?>
<?php if(nattywp_get_option('t_facebookurl') != '') { ?>
<li class="facebook"><a href="<?php $t_facebookurl = nattywp_get_option('t_facebookurl'); if ($t_facebookurl == 'no') { $t_facebookurl = 'http://facebook.com/'; } echo $t_facebookurl; ?>" title="<?php _e('Facebook profile', 'delicate'); ?>"><?php _e('Facebook', 'delicate'); ?></a></li>
<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional', 'delicate'); ?>"><?php _e('Valid', 'delicate'); ?> <abbr title="<?php _e('eXtensible HyperText Markup Language', 'delicate'); ?>"><?php _e('XHTML', 'delicate'); ?></abbr></a></li>
<?php } ?>
<?php wp_meta(); ?>
</ul>
</li><?php endif; ?> 
</ul>