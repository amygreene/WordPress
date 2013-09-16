<?php
/**
 * Footer Template
 *
 * This file is loaded by footer.php and used for content inside the #footer div
 *
 * @package K2
 * @subpackage Templates
 */
?>

<p class="footerpoweredby">
	<?php
		printf( _x('Powered by %1$s and %2$s', 'k2_footer', 'k2_domain'),
			'<a href="http://wordpressmu.org/">' . __('WordPress MU', 'k2_domain') . '</a>',
			'<a href="http://getk2.com/" title="' . __('Loves you like a kitten.', 'k2_domain') . '">K2</a>'

		);
	?>

<?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<br />&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;<?php _e('Hosted by','k2_domain'); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
</p>

<?php if ( get_k2info('style_footer') != '' ): ?>
	<p class="footerstyledwith">
		<?php k2info('style_footer'); ?>
	</p>
<?php endif; ?>

<p class="footerfeedlinks">
	<?php
		printf( _x('%1$s and %2$s', 'k2_footer', 'k2_domain'),
			'<a href="' . get_bloginfo('rss2_url') . '">' . __('Entries Feed','k2_domain') . '</a>',
			'<a href="' . get_bloginfo('comments_rss2_url') . '">' . __('Comments Feed','k2_domain') . '</a>'
		);
	?>
</p>

<p class="footerstats">
	<?php printf( __('%d queries. %s seconds.', 'k2_domain'), get_num_queries(), timer_stop(0, 3) ); ?>
</p>
