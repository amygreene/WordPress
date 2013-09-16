<?php get_header(); ?>

<!-- Begin top thumbnails -->
<div class="home-thumbs">
<?php $home_query = new WP_Query("cat=&showposts=5"); $i = 0; ?>
<ul class="thumbs">
	<?php while ($home_query->have_posts()) : $home_query->the_post();
	    $do_not_duplicate = $post->ID; $i++; ?>
	    <li class="post-<?php the_ID(); ?> thumb-big"><?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => '320x320', 'width' => '320', 'height' => '320' ) ); ?></li>
    <?php endwhile; wp_reset_query(); $i = 0; ?>
</ul>
</div>

<!-- Begin bottom thumbnails -->
<div class="home-thumbs bottom-thumbs">
<?php $home_query_bottom = new WP_Query("cat=&showposts=20&offset=5"); $b = 0; ?>
<ul class="thumbs">
	<?php while ($home_query_bottom->have_posts()) : $home_query_bottom->the_post();
	    $do_not_duplicate = $post->ID; $b++; ?>
	
	    <li class="post-<?php the_ID(); ?> thumb"><?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '160', 'height' => '160' ) ); ?></li>
    <?php endwhile; wp_reset_query(); $b = 0; ?>
</ul>
</div>

</div> <!--end container-->
<?php wp_footer(); ?>
</body>
</html>