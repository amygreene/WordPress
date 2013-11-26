<?php
/*
Template Name: User site listing
*/


get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

<?php
				//create array of faculty/staff usernames that don't include any numbers
				$facstaff_users = $wpdb->get_results("SELECT ID, user_login FROM wp_users WHERE user_login NOT REGEXP '[0-9]' ORDER BY user_login ASC");
				//print_r($facstaff_users);
				
				//get count of all facstaff users
				$facstaff_user_count = count($facstaff_users);
				echo '<p> Listing sites for <strong>'.$facstaff_user_count .'</strong> Faculty/Staff accounts:</p>'; 
				
				foreach ($facstaff_users AS $facstaff_user)
				{
					$user_blogs = get_blogs_of_user( $facstaff_user->ID ); //get user's blogs by user ID 
					echo ' '.$facstaff_user->user_login.'\'s sites:<ul>';
					foreach ($user_blogs AS $user_blog) {
				    	echo '<li><a href="http://' . $user_blog->domain . $user_blog->path .'" target="_blank">' . $user_blog->blogname . '</a> 
							| <a href="http://' . $user_blog->domain . $user_blog->path .'wp-admin/options-general.php?page=bcat_settings_site" target="_blank"> edit category</a>
							</li>';
					}
				echo '</ul>';
				}
				?>

				<?php if( is_multisite() ): ?>

				   The <?php echo esc_html( get_site_option( 'site_name' ) ); ?> network currently powers <?php echo get_blog_count(); ?> websites and <?php echo get_user_count(); ?> users.

				<?php endif; ?>

			</div><!-- #content -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>




