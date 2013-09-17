<!-- open --><div id="top">
<p><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></p>

<ul>
<?php
$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
foreach($years as $year) : 
?>
<li><a href="<?php echo get_year_link($year); ?> "><?php echo $year; ?></a></li>
<?php endforeach; ?>
</ul>

<!-- close top --></div>

<!-- close page --></div>

<!-- open footer-wrapper --><div id="footer-wrapper">

<!-- open footer --><div id="footer">

<!-- open about --><div id="about">
<h2><?php _e('About');?></h2>
<?php query_posts('pagename=about'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_excerpt(); ?>
<?php edit_post_link(__('Edit', '72class'), '<p>', '</p>'); ?>
<?php endwhile; ?>
<?php endif; ?>
<!-- close about --></div>

<p>&copy; <?php echo gmdate(__('Y')); ?> <?php bloginfo('name'); ?>.<br />
<small><?php _e('Powered by', '72class');?> <a href="http://wp.mu">WPMU</a>. <?php _e('Created by', '72class'); ?> <a href="http://alanwho.com">Alan Who?</a>.<br />
<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by', '72class'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?></small>
</p>
<?php wp_footer(); ?>
<!-- close footer --></div>

</body>

</html>