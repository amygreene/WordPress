<?php get_header(); ?>

<!-- open wrapper --><div id="wrapper">

<!-- open content --><div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- open post --><div class="post" id="post-<?php the_ID(); ?>">

<!-- open title --><div class="title">
<h2>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', '72class');?> <?php the_title(); ?>">
<?php the_title(); ?></a>
</h2><?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("72890nocolor"); } ?>
<!-- open postdata --><div class="postdata">
<?php edit_post_link(__('Edit', '72class'), '<span class="category">', '</span>'); ?>


<!-- close postdata --></div>

<!-- close title --></div>

<!-- open clearing --><div class="clearing"><!-- close clearing --></div>

<!-- open entry --><div class="entry">
<?php the_content(__('Read the rest of this entry &raquo;', '72class')); ?>
<!-- close entry --></div><?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("72890nocolor"); } ?>

<!-- close post --></div>

<!-- close content --></div>

<!-- close wrapper --></div>

<!-- close page --></div>

<?php endwhile; ?>

<?php if ( comments_open() ) comments_template('',true); // Get comments.php template ?> 

<?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.', '72class');?></p>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>