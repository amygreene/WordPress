<?php get_header(); ?>
<div id="main">

<?php if (have_posts()) : ?>  
<h1>Search Results</h1>              
<?php get_template_part( 'post' , 'entry') ?>                	

<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
<?php else : ?>
<h1>No Posts Founds</h1>
<p>Sorry, nothing found for that search</p>
<?php endif; ?>
</div><!-- /main -->
<?php get_sidebar(); ?>	
<?php get_footer(); ?>