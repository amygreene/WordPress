<?php
/*
Template Name: Planet
*/
?>

<?php get_header(); ?>
	<div id="content" class="subcontainer fleft">

			<div><h2 class="mainhead">Planet Evergreen</h2>
				<h3>Recent Site-wide Posts</h3>
			<ul>
			<?php ahp_recent_posts(15, 90, 127); ?>
			</ul>
			</div>
		
	
</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>