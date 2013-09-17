<?php
include ($functions . 'admin/css.php');
include ($functions . 'admin/header.php');
include ($functions . 'admin/options.php');
?>
<div class="wrap">
	<h3 class="title">
		<a href="?page=kreative_page_general">
			General Settings
		</a>
	</h3>
	
	<h3 class="title">
		<a href="?page=kreative_page_nav">
			Navigation Settings
		</a>
	</h3>
	
	<h3 class="title">
		<a href="?page=kreative_page_layout">
			Layout Options
		</a>	
	</h3>
	
	<h3 class="title">
		<a href="?page=kreative_page_optimize">
			Optimization Settings
		</a>	
	</h3>
	
	<h3 class="title">
		<span>
			Advertisement Settings
		</span>
	</h3>
	<div id="ajax-response"></div>
	
	<form method="post" name="kt_ads" target="_self">
		<?php echo kreative_form_builder('ads', $options['ads']); ?>
		<p class="submit">
			<input type="hidden" value="update" name="action" />
			<input class="button-primary" type="submit" name="submit" value="Update Advertisement" />
		</p>
	</form>
</div>