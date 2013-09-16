<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix" >
<div id="maincol" >

<?php if('' != get_header_image() ) { ?>
<a href="<?php bloginfo('url'); ?>"><img style="margin: 10px 0px 10px 0px;" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } ?>

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<h2 class="contentheader"><?php the_title(); ?></h2>
<div class="content">
<div class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'minimalist'); ?> <?php the_title_attribute(); ?>">Permanent Link</a></div>
<?php the_content(__('Read more &raquo;', 'minimalist')); ?>


<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<div id="postinfotext">
<?php _e('Posted:', 'minimalist'); ?> <?php the_time('F jS, Y') ?><br/>
<?php _e('Categories:', 'minimalist'); ?> <?php the_category(', ') ?><br/>
<?php _e('Tags:', 'minimalist'); ?> <?php the_tags(''); ?><br/>
<?php _e('Comments:', 'minimalist'); ?> <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'minimalist'), __('1 Comment', 'minimalist'), __('% Comments', 'minimalist')); ?></a>.
</div>

</div>	
<?php endwhile; ?>

<div class="navigation">
<span class="prevlink"><?php next_posts_link(__('Previous entries', 'minimalist')) ?></span>
<span class="nextlink"><?php previous_posts_link(__('Next entries', 'minimalist')) ?></span>
</div>

<?php else : ?>
<h2 class="contentheader"><?php _e('Not found!', 'minimalist'); ?></h2>
<p><?php _e('Could not find the requested page. Use the navigation menu to find your target, or use the search box below:', 'minimalist'); ?></p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>



</div>
</div>

<?php get_footer(); ?>