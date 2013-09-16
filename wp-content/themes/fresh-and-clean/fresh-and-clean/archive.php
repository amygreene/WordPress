<?php get_header(); ?>
	<div id="main">
		<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; ?>
		<?php if (is_category()) { ?>
			<h1 id="category-title"><?php single_cat_title(); ?></h1>
		<?php } elseif( is_tag() ) { ?>
			<h1 id="category-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
		<?php  } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
		<?php  } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>
		<?php  } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>
		<?php  } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
		<?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
		<?php } ?>
		            
		<?php get_template_part( 'post' , 'entry') ?>	
        
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
<?php endif; ?>
</div><!-- End Main -->		
<?php get_sidebar(); ?>	
<?php get_footer(); ?>