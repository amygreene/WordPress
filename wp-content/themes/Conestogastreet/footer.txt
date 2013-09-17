</div>

</td>
<td width=30 height=100% style="border-right: 1px solid #999999;">&nbsp;</td>

<td valign=top>
<div class="archives">
<form>
	<select NAME="site" onChange="jumpTo(this);">
	<option selected value>Archives
	<?php wp_get_archives('type=monthly&format=option'); ?>	
	</select>
</form>
<br>
<form id="searchform" method="get" action="<?php echo $PHP_SELF; ?>">
 <input type="text" name="s" id="search" size="15" onFocus='form.s.value=""' />
</form> 
<br>

<hr class="hr1" />
<br>

<div id="menu">

<b>About Me</b><br>
<img src="<?php bloginfo('url'); ?>/wp-content/themes/Conestogastreet/images/profile.jpg" style="border:1px solid #666666;" border="0"><br>
My name is <?php the_author(); ?></a><br>and this is my weblog.

 <br><br>

<hr class="hr1" /><br>

<b>Main Menu</b><br>
<a href="<?php bloginfo('url'); ?>">Home</a><br>
	<?php wp_list_cats('list=0'); ?><br>

<hr class="hr1" /><br>

<b>Links</b><br>
<?php get_links_list(); ?><br>

<hr class="hr1" /><br>

<b>Meta</b><br>
<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> 2.0'); ?></a><br>
<a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr> 2.0'); ?></a><br>
<a href="http://wordpress.org/" title="<?php _e('Powered by WordPress; state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a><br><br>

</div>

</div>
</td>
</tr></table>

</td></tr></table>
<br>
<hr class="hr1 padtop" width="920" align="center" />
<center><table cellpadding=0 cellspacing=0 width=850><tr><td align=center>
<div class="metaBottom">
Copyright &copy; <?php bloginfo('name'); ?>  <br /><a href="http://thoughtmechanics.com">Chicago Web Design</a> Theme - Powered By <a href="http://wordpress.org">Wordpress</a>
</div>
</td></tr></table></center>
<br>
