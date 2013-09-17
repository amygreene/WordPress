<?php get_header(); ?>

		<div class="title">
		  <h2><?php _e('Error 404',TEMPLATE_DOMAIN);?>- <?php _e('File not Found',TEMPLATE_DOMAIN);?></h2>
		</div>
        <div class="post">
		  <p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN);?></p>
		  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
	    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>