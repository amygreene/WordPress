<?php while (have_posts()) : the_post(); ?>
<div class="post">
<div class="postcontent">
<?php if ( has_post_thumbnail() ) {  ?>
<div class="thumbnail-wrap">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
</div><!-- END thumbnail-wrap -->
<?php } ?>
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_excerpt(); ?>
</div><!-- END Post Content -->
</div><!-- END Post -->
<?php endwhile; ?>