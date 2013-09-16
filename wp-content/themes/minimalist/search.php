<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix" > 
<div id="maincol" >



<?php if (have_posts()) : ?>
<h2 class="contentheader">Search results</h2>
<?php while (have_posts()) : the_post(); ?>


<h2 class="contentheader"><?php the_title(); ?></h2>

<?php the_excerpt() ?>

<div id="postinfotext">
<?php _e('Posted:', 'minimalist'); ?> <?php the_time('F jS, Y') ?><br/>
<?php _e('Categories:', 'minimalist'); ?> <?php the_category(', ') ?><br/>
<?php _e('Tags:', 'minimalist'); ?> <?php the_tags(''); ?><br/>
<?php _e('Comments:', 'minimalist'); ?> <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'minimalist'), __('1 Comment', 'minimalist'), __('% Comments', 'minimalist')); ?></a>.
</div>


<?php endwhile; ?>

<div class="navigation">
<span class="prevlink"><?php next_posts_link(__('Previous entries', 'minimalist')) ?></span>
<span class="nextlink"><?php previous_posts_link(__('Next entries', 'minimalist')) ?></span>
</div>

<?php else : ?>
<h2 class="contentheader"><?php _e('Search results', 'minimalist'); ?></h2>
<p><?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'minimalist'); ?></p>
<?php endif; ?>

</div>
</div>

<?php get_footer(); ?>