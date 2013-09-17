<?php get_header(); ?>



<?php is_tag(); ?>

	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Thanks Kubrick for this code ?>

		<?php if (is_category()) { ?>
		<h2><?php _e('Archive for ',TEMPLATE_DOMAIN); echo single_cat_title(); ?></h2>

<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h2 class="pagetitle"><?php _e('Posts Tagged',TEMPLATE_DOMAIN);?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		
 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for ',TEMPLATE_DOMAIN); the_time('F j, Y'); ?></h2>
		
	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for ',TEMPLATE_DOMAIN); the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for ',TEMPLATE_DOMAIN); the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive',TEMPLATE_DOMAIN); ?></h2>

		<?php } ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post">

				<h2 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<p class="postmeta">
				{ <?php the_time(get_option('date_format')) ?> @ <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_time() ?></a> }
				&#183;
				{ <?php the_category(', ') ?> }
				<br />
				{ <?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', ''); ?> }
				&#183;
				{ <?php comments_popup_link(__('No Comments',TEMPLATE_DOMAIN), __('Comments (1)',TEMPLATE_DOMAIN), __('Comments (%)',TEMPLATE_DOMAIN), 'commentslink', __('Comments off',TEMPLATE_DOMAIN)); ?> }
				</p>

				<div class="postentry">



<?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content("... continue reading this entry.",TEMPLATE_DOMAIN); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>


</div>

				<p class="postfeedback">
				<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), '&nbsp; {', '}'); ?>
				</p>

			</div>
				
		<?php endwhile; ?>

		<?php posts_nav_link(' &#183; ', __('Next entries &raquo;',TEMPLATE_DOMAIN), __('&laquo; Previous entries',TEMPLATE_DOMAIN)); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found',TEMPLATE_DOMAIN); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.',TEMPLATE_DOMAIN); ?></p>
		
		<h3><?php _e('Search',TEMPLATE_DOMAIN); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
