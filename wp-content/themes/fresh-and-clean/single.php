<?php get_header(); ?>
<div id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>				
	<div class="post single">
		<h1 id="single-title"><?php the_title(); ?></h1>
				<div id="byline">
					Posted by <?php the_author() ?> On <?php the_time('F jS, Y') ?> / <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
				</div><!-- /Post Byline -->
		<div class="postcontent"> 
       		<?php if ($xs_disable_thumbnails_posts == "true") { ?>
			<?php } else { ?>
			<?php if ( has_post_thumbnail() ) {  ?>
            <div class="thumbnail-wrap">
			<?php the_post_thumbnail('singe-post-image'); ?>
            </div><!-- END thumbnail-wrap -->
		<?php } } ?>
		<?php the_content(); ?>
        <p id="post-admin"><?php edit_post_link( $link, $before, $after, $id ); ?></p>
	</div><!-- /Postcontet -->
    <?php get_template_part( 'post','relatedposts') ?>
</div><!-- /Post -->
<div class="clear"></div>
<?php  comments_template(); ?>
<?php endwhile; ?>
<?php endif; ?>
</div><!-- End Main -->			
<?php get_sidebar(); ?>	
<?php get_footer(); ?>