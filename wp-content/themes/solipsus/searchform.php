<center><form method="get" action="<?php bloginfo('home'); ?>">
<p>
<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" /> <input type="submit" value="<?php _e('Search',TEMPLATE_DOMAIN); ?>" />
</p>
</form></center>