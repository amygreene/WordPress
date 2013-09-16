<?php
/*
Template Name: program
*/
?>

<?php get_header(); ?>
	<div id="content" class="subcontainer fleft">

			<div><h2 class="mainhead">Program/Course Sites</h2>
				<p>Below is a listing of academic program sites on blogs.evergreen.edu. For a full listing of all academic program web pages go to <a href="http://academic.evergreen.edu">academic.evergreen.edu</a>.</p> <br />
						
			<?php
				$query = "SELECT * FROM " . $wpdb->base_prefix . "blog_types WHERE blog_types LIKE '%|program|%'";
				$blogs = $wpdb->get_results( $query, ARRAY_A );
							if (count($blogs) > 0){
					echo '<ul>';
					foreach ($blogs as $blog){
						$siteurl = get_blog_option( $blog['blog_ID'], 'siteurl' );
						$title = get_blog_option( $blog['blog_ID'], 'blogname' );
						echo '<li>';
						echo '<a href="' . $siteurl . '">' . $title . '</a>';
						echo '</li>';
					}
					echo '</ul>';
			
				
				}
?>
			</div>
		
	
</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>


