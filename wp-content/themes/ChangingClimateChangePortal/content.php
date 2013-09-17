<?php
/**
* The default template for displaying content. Used for both single and index/archive/search.
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
  //if( ! is_admin() ) {
  jQuery(document).ready(function() {
	jQuery("#accordion").accordion();
  });
  // }
</script>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
  <div class="featured-post">
	<?php _e( 'Featured post', 'twentytwelve' ); ?>
  </div>
  <?php endif; ?>
  <header class="entry-header">
	<?php the_post_thumbnail(); ?>
	<?php if ( is_single() ) : ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
	<h1 class="entry-title">
	  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
	<?php endif; // is_single() ?>
	<?php if ( comments_open() ) : ?>
	<div class="comments-link">
	  <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
	</div><!-- .comments-link -->
	<?php endif; // comments_open() ?>
  </header><!-- .entry-header -->
  
		  <?php if ( is_search() ) : // Only display Excerpts for Search ?>
		  <div class="entry-summary">
			  <?php the_excerpt(); ?>
		  </div><!-- .entry-summary -->
		  <?php else : ?>
		  <div class="entry-content">
			  <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
		  
			<?php
			  	// Get all custom fields
				//$custom_fields = get_post_custom();
				//global $post;
				$organization_type = get_post_custom_values("organization type");
				echo '<p><strong>Organization Type: </strong>' . $organization_type[0] . '</p>';
			?>
		  <div id="accordion">
			<?php //Custom Fields
			// Website custom
			$website_values = get_post_custom_values("website");
			$website_count = count($website_values);
			if (isset($website_values[0])) {
			  echo "<h3>Website</h3>";
			  echo '<div>';
			  for ($i = 0; $i < $website_count; $i++){
				$this_website = $website_values[$i];
				echo '<a href="' . $this_website . '">' . $this_website . '</a>';
				echo '<br />';
			  }
			  echo '</div>';			  
			}
			// email custom
			$email_values = get_post_custom_values("email");
			$email_count = count($email_values);
			if (isset($email_values[0])) {
			  echo "<h3>Contact e-mail</h3>";
			  echo '<div>';
			  for ($i = 0; $i < $email_count; $i++){
				$this_email = $email_values[$i];
				echo '<a href="mailto:' . $this_email . '">' . $this_email . '</a>';
				echo '<br />';
			  }
			  echo '</div>';
			}
			// phone custom
			$phone_values = get_post_custom_values("phone");
			$phone_count = count($phone_values);
			if (isset($phone_values[0])) {
			  echo "<h3>Telephone</h3>";
			  echo '<div>';
			  for ($i = 0; $i < $phone_count; $i++){
				$this_phone = $phone_values[$i];
				echo '<p>' . $this_phone . '</p>';
			  }
			  echo '</div>';
			}
			// address custom
			$address_values = get_post_custom_values("address");
			$address_count = count($address_values);
			if (isset($address_values[0])) {
			  echo "<h3>Address</h3>";
			  echo '<div>';
			  for ($i = 0; $i < $address_count; $i++){
				$this_address = $address_values[$i];
				echo '<address>' . $this_address . '</address>';
			  }
			  echo '</div>';
			}
			?>
		  </div> <!--jQuery accordion div -->
			  <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		  </div><!-- .entry-content -->
		  <?php endif; ?>
  
		  <footer class="entry-meta">
			  <?php twentytwelve_entry_meta(); ?>
			  <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			  <?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				  <div class="author-info">
					  <div class="author-avatar">
						  <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					  </div><!-- .author-avatar -->
					  <div class="author-description">
						  <h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						  <p><?php the_author_meta( 'description' ); ?></p>
						  <div class="author-link">
							  <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								  <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							  </a>
						  </div><!-- .author-link	-->
					  </div><!-- .author-description -->
				  </div><!-- .author-info -->
			  <?php endif; ?>
		  </footer><!-- .entry-meta -->
	  </article><!-- #post -->
