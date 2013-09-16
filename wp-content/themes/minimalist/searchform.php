<h1><?php _e('Site search', 'minimalist'); ?></h1>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div>
<label for="s">Search for:</label>
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="14" />
<input type="hidden" id="searchsubmit" value="<?php _e('Search', 'minimalist'); ?>" />
</div>
</form>