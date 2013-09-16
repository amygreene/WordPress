<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix" > 
<div id="maincol" >



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h2 class="contentheader"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'minimalist'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<?php the_content(__('<p class="serif">Read more &raquo;</p>', 'minimalist')); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<?php edit_post_link(__('Edit this page', 'minimalist'),'<p>','</p>'); ?>

<?php comments_template('',true); ?>

<?php endwhile; endif; ?>



</div>
</div>

<?php get_footer(); ?>