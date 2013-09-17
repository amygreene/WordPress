<div class="SR">

<!-- Start SideBar1 -->
<div class="SRL">


<!-- Start Search -->
<div class="Search">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="s" class="keyword" />
<div class="bt">
<input name="submit" type="image" class="search" title="Search" src="<?php bloginfo('template_url'); ?>/images/ButtonTransparent.png" alt="Search" />
</div>
</form>
<div class="Syn">
 <ul>
  <li><a href="<?php bloginfo('rss2_url'); ?>">Entries</a> (RSS)</li>
  <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a> (RSS)</li>
 </ul>
</div>
</div>
<!-- End Search -->


<!-- Start About This Blog -->
<?php include (TEMPLATEPATH . "/about-blog.php"); ?>
<!-- End About This Blog -->


<!-- Start Recent Comments/Articles -->
<div class="Recent">
<ul class="TabMenu">
 <li class="TabLink"><a href="#top" id="tab0" onclick="ShowTab(0)"><span>Recent Comments</span></a></li>
 <li class="TabLink"><a href="#top" id="tab1" onclick="ShowTab(1)"><span>Recent Articles</span></a></li>
 <li class="NavLinks" id="paging0"><div style="display:none"></div></li>
 <li class="NavLinks" id="paging1"><div style="display:none"></div></li>
</ul>
<?php if (function_exists('mdv_recent_comments')) { ?>
<div class="TabContent" style="display:none" id="div0">
 <ul>
 <?php mdv_recent_comments(); ?>
 </ul>
</div>
<?php } ?>
<?php if (function_exists('mdv_recent_posts')) { ?>
<div class="TabContent" style="display: none" id="div1">	
 <ul>
  <?php mdv_recent_posts(); ?>
 </ul>
</div>
<?php } ?>
<script type="text/javascript">ShowTab(0);</script>
</div>
<!-- End Recent Comments/Articles -->


<!-- Start Flickr Photostream -->
<?php if (function_exists('get_flickrrss')) { ?>
<div class="widget widget_flickrrss" style="border-bottom: none;">
  <h2>Flickr PhotoStream</h2>
  <ul>
   <?php get_flickrrss(); ?> 
  </ul>
</div>
<?php } ?>
<!-- End Flickr Photostream -->


<br clear="all" />
<!-- Start Adsense -->
<div class="widget adsense">
<h2>Sponsors</h2>
<script type="text/javascript"><!--
google_ad_client = "pub-7891292310029227";
google_ad_width = 300;
google_ad_height = 250;
google_ad_format = "300x250_as";
google_ad_type = "text";
google_ad_channel ="2032476629";
google_color_border = "fff3e2";
google_color_bg = "fff3e2";
google_color_link = "cc0000";
google_color_url = "856d65";
google_color_text = "856d65";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<!-- End Adsense -->


<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>
<!-- End SideBar1 -->


<!-- Start SideBar2 -->
<div class="SRR">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>	

<!-- Start Categories -->
<div class="widget widget_categories">
<h2>Categories</h2>
 <ul>
  <?php wp_list_cats('show_count=1'); ?>
 </ul>
</div>
<!-- End Categories -->

<!-- Start Archives -->
<div class="widget widget_archives">
<h2>Archives</h2>
 <ul>
  <?php wp_get_archives('type=monthly'); ?>
 </ul>
</div>
<!-- End Archives -->

<!-- Start Links -->
<div class="widget widget_links">
<h2>Links</h2>
 <ul><?php get_links('-1', '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
</ul>
</div>
<!-- End Links -->	

<!-- Start Meta -->
<div class="widget widget_meta">
<h2>Meta</h2>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<?php wp_meta(); ?>
</ul>
</div>
<!-- End Meta -->

<?php endif; ?>
</div>
<!-- End SideBar2 -->

</div>