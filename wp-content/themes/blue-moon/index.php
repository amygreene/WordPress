<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php if (is_category()) { ?>
<h2 class='archives'><?php _e('Archive for the','blue-moon');?> '<?php echo single_cat_title(); ?>' <?php _e('Category','blue-moon');?></h2>
<?php } elseif (is_day()) { ?>
<h2 class='archives'><?php _e('Archive for','blue-moon');?>
<?php the_time(__('F jS, Y')); ?>
</h2>

<?php } elseif (is_month()) { ?>
<h2 class='archives'><?php _e('Archive for','blue-moon');?>
<?php the_time('F, Y'); ?>
</h2>
<?php } elseif (is_year()) { ?>

<h2 class='archives'><?php _e('Archive for','blue-moon');?>
<?php the_time('Y'); ?>
</h2>

<?php } elseif (is_author()) { ?>

<h2 class='archives'><?php _e('Author Archive','blue-moon');?></h2>

<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

<h2><?php _e('Blog Archives','blue-moon');?></h2>

<?php } ?>

<?php while (have_posts()) : the_post(); ?>

<div class="entry">

<h3 class="entrytitle" id="post-<?php the_ID(); ?>">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php the_title(); ?>
</a>

</h3>


<div class="entrymeta">
<?php if(!is_page()){ ?><?php _e('Posted by ','blue-moon');?><?php the_author_posts_link(); ?>&nbsp;<?php _e('in','blue-moon'); ?>&nbsp;<?php the_time('F j, Y '); ?>&nbsp;&nbsp;&nbsp;<?php $comments_img_link= '<img src="' . get_stylesheet_directory_uri() . '/images/comments.gif"  title="'.__('comments','blue-moon').'" alt="*" /><strong>'; comments_popup_link($comments_img_link .__(' Comments(0)','blue-moon'), $comments_img_link .__(' Comments(1)','blue-moon'), $comments_img_link .__(' Comments(%)')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
<?php edit_post_link(__('Edit','blue-moon')); ?>
</strong> </div>


<div class="entrybody">

<?php if( is_archive() || is_search() || is_category() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<a href="<?php the_permalink() ?>"><?php printf( __('<p>Click here to read more &raquo;</p>', 'blue-moon') ); ?></a>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280graphite"); } ?>
<?php } else { ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280graphite"); } ?>
<?php the_content( __('<p>Click here to read more &raquo;</p>', 'blue-moon') ); ?>

<?php wp_link_pages('before=<p>&after=</p>'); ?>

<?php } ?>

</div>

</div>


<?php endwhile; ?>

<?php if(is_page()) { ?>
<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
<?php } else { ?>
<?php comments_template('',true); ?>
<?php } ?>


<?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.','blue-moon'); ?></p>

<?php endif; ?>


<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page','blue-moon'), __('Next Page &raquo;','blue-moon')); ?></p>

<?php if(is_single()) { ?>
<div id="post-navigator-single">
<div class="alignleft"><?php previous_post_link('&laquo;%link') ?></div>
<div class="alignright"><?php next_post_link('%link&raquo;') ?></div>
</div>
<?php } ?>

</div>


<?php get_sidebar(); ?>


<?php get_footer(); ?>


