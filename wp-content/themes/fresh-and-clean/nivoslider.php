<?php
// get custom post type ==> slides
global $post;
$args = array(
	'post_type' =>'slides',
	'numberposts' => -1,
	'orderby' => 'ASC'
);
$slider_posts = get_posts($args);
?>
<?php if($slider_posts) { ?>
<div id="slider" class="nivoSlider"> 
<?php 
	foreach($slider_posts as $post) : setup_postdata($post);
	$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'header-image');
	// get metabox data
	$slidelink = get_post_meta($post->ID, 'slides_url', TRUE);
?>
     <?php if ( has_post_thumbnail() ) { ?>
		<?php
		// show link with slide if meta exists
		if($slidelink != '') { ?>
     	<a href="<?php echo $slidelink ?>" title="<?php the_title(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="880" height="280" title="<?php the_title(); ?>" /></a>
        <?php
         // no meta link defined, show plain img
        } else { ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" width="880" height="280" title="<?php the_title(); ?>" />
        <?php } } ?>
<?php endforeach; ?>
</div>
<!-- END slider -->
<?php } ?>