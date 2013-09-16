<?php
/*
Template Name: Other
*/
?>

<?php get_header(); ?>
	<div id="content" class="subcontainer fleft">

			<div><h2 class="mainhead">Misc./Other Sites</h2>
						
			<?php
				$query = "SELECT * FROM " . $wpdb->base_prefix . "blog_types WHERE blog_types LIKE '%|other|%'";
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


