<div id="related-posts">
<h4>Related Posts</h4>
<ul>
<?php foreach(get_the_category() as $category){ $cat = $category->cat_ID; } query_posts('cat=' . $cat . '&orderby=rand&showposts=3'); ?>
<?php while (have_posts()) : the_post();
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); ?>
<li>
<?php if ( has_post_thumbnail() ) {  ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('related-image'); ?></a>
<?php } ?>
<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<?php the_news_excerpt('15','','','plain','no'); ?>
<div class="clear"></div>
</li>
<?php endwhile; wp_reset_query(); ?>
</ul>

</div><!-- /related-posts -->