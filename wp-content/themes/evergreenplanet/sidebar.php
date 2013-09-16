<div id="sidebar" class="sidecontainer fright">
	<!--
	<div class="widgets">
	
		<h2 class="mainhead">RSS Feed</h2>
		<p class="feed"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe to feed <br /><span>get the latest updates!</span></a></p>
		<form method="get" id="ksearchform" action="<?php bloginfo('home'); ?>/">
			<div>
				<input type="text" size="18" value="" name="s" id="s" />
				<input type="submit" id="ksearchsubmit" value="Search" class="btn" />
			</div>
			<br class="clear" />
		</form>

	</div>
		-->
	<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : /* Widgetized sidebar */ ?>
 
		<?php endif; ?>
	</ul>
		
</div><!--end of #sidebar -->