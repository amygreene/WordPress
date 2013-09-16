<form method="get" action="/">
<p>
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" size="18" name="s" id="s" />
<input type="submit" value="<?php _e('Search',TEMPLATE_DOMAIN); ?>" />
</p>
</form>
