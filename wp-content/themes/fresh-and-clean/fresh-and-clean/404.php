<?php get_header(); ?>
		<div id="main">			
			<div class="post noborder">
				<h1>404 Error</h1>		
					<div class="postcontent">
						<p>Sorry the page you were looking for could not be retrieved. Why don't you take a look through our archives?</p>
							<ul>
								<?php wp_get_archives('type=monthly&limit=12'); ?>
							</ul>
					</div><!-- /Post Content -->
			</div><!-- /Post-->
	<div class="clear"></div>
</div><!-- /Main -->			
<?php get_sidebar(); ?>	
<?php get_footer(); ?>