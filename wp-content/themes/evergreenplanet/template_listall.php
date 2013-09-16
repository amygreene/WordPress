<?php
/*
Template Name: List All
*/
//add " AND public = '1' " to query string to protect private blogs
?>


<?php get_header(); ?>

	<div id="content" class="subcontainer fleft">

			<div><h2 class="mainhead">Listing of All Blogs</h2>
						
				<?php
				    global $wpdb;
				    $query = "SELECT blog_id FROM " . $wpdb->base_prefix . "blogs WHERE spam != '1' AND archived != '1' AND deleted != '1' AND blog_id != '1' ORDER BY path";

				    $blogs = $wpdb->get_results($query);

				    echo '<ul>';
				    foreach($blogs as $blog){
					$blog_details = get_blog_details($blog->blog_id);
				        echo '<li>' . $blog_details->blogname .';'. $blog_details->siteurl .';</li>';
				    }
				    echo '</ul>';
				
				?>
			</div>
		
	
</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>


