<?php get_header(); ?>

<?php get_sidebar(); ?>



<div id="wrapper" class="clearfix" > 

<div id="maincol" >



<?php if (have_posts()) : ?>



 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

 	  <?php /* If this is a category archive */ if (is_category()) { ?>

		<h2 class="contentheader"><?php _e('News for the', 'minimalist'); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category', 'minimalist'); ?></h2>

 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>

		<h2 class="contentheader"><?php _e('Posts Tagged', 'minimalist'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>

		<h2 class="contentheader"><?php _e('News for', 'minimalist'); ?> <?php the_time('F jS Y'); ?></h2>

 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

		<h2 class="contentheader"><?php _e('News for', 'minimalist'); ?> <?php the_time('F Y'); ?></h2>

 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

		<h2 class="contentheader"><?php _e('News for', 'minimalist'); ?> <?php the_time('Y'); ?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>

		<h2 class="contentheader"><?php _e('Author News Archive', 'minimalist'); ?></h2>

 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

		<h2 class="contentheader"><?php _e('Blog Archives', 'minimalist'); ?></h2>

 	  <?php } ?>





<?php while (have_posts()) : the_post(); ?>

<h2 class="contentheader"><?php the_title(); ?></h2>

<div class="content">

<div class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'minimalist'); ?> <?php the_title_attribute(); ?>">Permanent Link</a></div>

<?php the_content() ?>







<div id="postinfotext">
<?php _e('Posted:', 'minimalist'); ?> <?php the_time('F jS, Y') ?><br/>
<?php _e('Categories:', 'minimalist'); ?> <?php the_category(', ') ?><br/>
<?php _e('Tags:', 'minimalist'); ?> <?php the_tags(''); ?><br/>
<?php _e('Comments:', 'minimalist'); ?> <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'minimalist'), __('1 Comment', 'minimalist'), __('% Comments', 'minimalist')); ?></a>.
</div>

</div>

<?php endwhile; ?>





<?php else : ?>

<?php endif; ?>

</div>

</div>

<?php get_footer(); ?>