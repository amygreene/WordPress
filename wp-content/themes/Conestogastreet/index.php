<?php get_header(); ?>

<?php
$i=0;
if ($posts) {
foreach($posts as $post) { start_wp();
?>
<?php $i++; ?>
<div class="post">
	 <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" style="text-decoration:none;" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h3>
	<div class="meta"><?php the_time("l F dS Y") ?>, <?php the_time() ?> <?php edit_post_link(); ?><br>
<?php _e("Filed under:"); ?> <?php the_category(',') ?></div>
	
		<?php the_content(); ?>

	<div align=center><?php wp_link_pages(); ?><?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?></div>
	<br>
	
<?php if ($i < count($posts)) { ?>
	<hr class="hr1" />
<?php } ?>

	<!--
	<?php trackback_rdf(); ?>
	-->

<?php comments_template(); // Get wp-comments.php template ?>
</div>
<?php } // closes printing entries with excluded cats ?>

<?php } else { ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php } ?>

<?php get_footer(); ?>
