<?php global $hemingway ?>
<hr class="hide" />
	<div id="ancillary">
		<div class="inside">
			<div class="block first">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
<?php endif; ?>
</div>

			<div class="block">
			  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
<?php endif; ?>
			</div>
			
			<div class="block">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>
<?php endif; ?>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
	<!-- [END] #ancillary -->	