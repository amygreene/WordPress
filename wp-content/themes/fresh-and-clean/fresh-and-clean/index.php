<?php get_header(); ?>
<div id="main">

<?php if (have_posts()) : ?>                
<?php get_template_part( 'post' , 'entry') ?>                	
<?php endif; ?>
            
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
</div><!-- END Main -->		
<?php get_sidebar(); ?>	
<?php get_footer(); ?>