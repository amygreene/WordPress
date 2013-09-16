<?php get_header(); ?>

<div id="content">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
    <?php the_content(); ?>
    <div class="clear"></div>
        <div class="postmetadata">
            <div class="date"><span class="ui-icon ui-icon-clock"></span> <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div> <div class="categories"><span class="ui-icon ui-icon-folder-open"></span> <?php if (the_category(', '))  the_category(); ?> <?php if (get_the_tags()) the_tags(' | '); ?></div> <div class="comment-link"><span class="ui-icon ui-icon-comment"></span><?php comments_popup_link('Leave A Comment &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div> <?php edit_post_link('Edit', '| ', ''); ?>
        </div>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<?php get_footer(); ?>