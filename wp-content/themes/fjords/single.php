<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="pagina">
	
			<h2 class="post-titulo" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			
			<p class="postmeta">
			<?php _e("by",TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?> <?php _e("on",TEMPLATE_DOMAIN); ?> <?php the_time(get_option('date_format')) ?> <?php _e('at',TEMPLATE_DOMAIN); ?> <?php the_time() ?>
			&#183; <?php _e('Filed under',TEMPLATE_DOMAIN); ?> <?php the_category(', ') ?>
			<?php the_tags( __(' and ',TEMPLATE_DOMAIN) . __( 'tagged',TEMPLATE_DOMAIN ) . ': ', ', ', ''); ?>
			<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN), ' &#183; ', ''); ?>
			</p>
		
			<div class="postentry">
            <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
			<?php the_content(__('Read the rest of this entry &raquo;',TEMPLATE_DOMAIN)); ?>
			<?php wp_link_pages(); ?>
            <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
			</div>

			<p class="linkpermanente">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to',TEMPLATE_DOMAIN); ?> <?php the_title(); ?>" class="permalink"><?php _e('Permalink'); ?></a>
			</p>
			
		</div>
		
  <?php comments_template('', true); ?>
				
	<?php endwhile; else : ?>

		<h2><?php _e('Not Found',TEMPLATE_DOMAIN); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.',TEMPLATE_DOMAIN); ?></p>
		
		<h3><?php _e('Search',TEMPLATE_DOMAIN); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


