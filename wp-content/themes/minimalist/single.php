<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix" > 
<div id="maincol" >





<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<h2 class="contentheader"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'minimalist'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<?php the_content(__('<p>Read more &raquo;</p>', 'minimalist')); ?>


<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<div id="postinfotext">
<?php _e('Posted:', 'minimalist'); ?> <?php the_time('F jS, Y') ?><br/>
<?php _e('Categories:', 'minimalist'); ?> <?php the_category(', ') ?><br/>
<?php _e('Tags:', 'minimalist'); ?> <?php the_tags(''); ?><br/>
<?php _e('Comments:', 'minimalist'); ?> <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'minimalist'), __('1 Comment', 'minimalist'), __('% Comments', 'minimalist')); ?></a>.
</div>


<?php comments_template('',true); ?>

<?php endwhile; else: ?>
<p><?php _e('No matching entries found.', 'minimalist'); ?></p>
<?php endif; ?>


</div>
</div>

<?php get_footer(); ?>