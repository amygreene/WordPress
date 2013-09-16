<?php get_header() ?>

	<div id="main">

	<div id="content">	

	<?php if ($posts) { ?>	

		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>

		<h3><?php _e('Search Results for','connections'); ?> &quot;<?php echo wp_specialchars($s, 1); ?>&quot;</h3>

		<div class="post-info"><?php _e('Did you find what you wanted ?','connections') ?></div>

		<br/>				

		<?php foreach ($posts as $post) : start_wp(); ?>

			<?php require('post.php'); ?>

		<?php endforeach; ?>

		<div class="navigation">

			<div class="alignleft"><?php posts_nav_link('', '', __('&laquo; Older Entries','connections')) ?></div>

			<div class="alignright"><?php posts_nav_link('', __('Newer Entries &raquo;','connections'), '') ?></div>

		</div>	

	<?php } else { ?>

		<h2 class="center"><?php _e('Not Found','connections') ?></h2>

		<p><?php _e('Sorry, no posts matched your criteria.','connections'); ?></p>

	<?php } ?>		

	</div>

	<div id="sidebar">

		<h2><?php _e('Currently Browsing','connections') ?></h2><ul><li><p><?php _e('You have searched the archives','connections');?>

			<?php _e('for','connections');?> <strong>'<?php echo wp_specialchars($s, 1); ?>'</strong>. <?php _e('If you are unable to find anything in these search results, you can try one of these links.','connections');?></p></li></ul>

		<?php get_sidebar(); ?>

	</div>

<?php get_footer(); ?>

</div>

</div>

</body>

</html>

