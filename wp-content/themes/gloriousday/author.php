<?php get_header();?>
<div id="main">
	<div id="content">
	<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<div class="post">
<h2><?php _e('Author Profile',TEMPLATE_DOMAIN); ?></h2>
<h3><?php _e('About:');?> <?php echo $curauth->nickname; ?></h3>
<p><img src="<?php bloginfo('stylesheet_directory');?>/img/<?php echo $curauth->user_login; ?>-big.jpg" class="left" alt="<?php _e('Profile Image of',TEMPLATE_DOMAIN); ?> <?php echo $curauth->nickname; ?>" title="<?php _e('Profile Image of',TEMPLATE_DOMAIN); ?> <?php echo $curauth->nickname; ?>" /></p>
<dl>
<dt><?php _e('Full Name',TEMPLATE_DOMAIN); ?></dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<dt><?php _e('Website',TEMPLATE_DOMAIN); ?></dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<dt><?php _e('Details',TEMPLATE_DOMAIN); ?></dt>
<dd><?php echo $curauth->description; ?></dd>
</dl>

			<h3><?php _e('Posts by',TEMPLATE_DOMAIN); ?> <?php echo $curauth->nickname; ?>:</h3>
			<ul class="authorposts">
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<em><?php the_time('d M Y'); ?></em>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:',TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.',TEMPLATE_DOMAIN); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>
  <p align="center">
    <?php posts_nav_link(' - ',__('&#171; Newer Posts',TEMPLATE_DOMAIN),__('Older Posts &#187;',TEMPLATE_DOMAIN)) ?>
  </p>
	</div>
</div>
  <?php get_sidebar();?>
  <?php get_footer();?>