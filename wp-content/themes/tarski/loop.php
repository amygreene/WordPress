<?php is_tag(); ?>
<?php if (have_posts()) { ?>

<div id="primary">

<?php if(!is_single() && !is_home() &&!is_page()) { ?>
		<div class="entry archive">
			<div class="post-meta">
		<?php if(is_category()) { ?>
			<h1 class="post-title"><?php _e("Category Archive",TEMPLATE_DOMAIN); ?></h1>
		</div>
		<div class="post-content">
			<p><?php _e('You are currently browsing the category archive for the',TEMPLATE_DOMAIN);?> '<?php echo single_cat_title(); ?>' <?php _e('category.',TEMPLATE_DOMAIN);?></p>
		<?php } ?>
		<?php if(is_tag()) { ?>
			<h1 class="post-title"><?php _e("Tag Archive",TEMPLATE_DOMAIN); ?></h1>
		</div>
		<div class="post-content">
			<p><?php _e('You are currently browsing the',TEMPLATE_DOMAIN);?> <?php _e("tag archive for the",TEMPLATE_DOMAIN); ?> '<?php echo single_tag_title(); ?>' <?php _e("tag",TEMPLATE_DOMAIN); ?>.</p>
		<?php } ?>
		<?php if(is_author()) { ?>
				<h1 class="post-title"><php _e('Author Archive',TEMPLATE_DOMAIN);?></h1>
			</div>
			<div class="post-content">
				<p><?php _e("You are currently browsing",TEMPLATE_DOMAIN); ?> <?php $post = $wp_query->post;
				$the_author = $wpdb->get_var("SELECT meta_value FROM $wpdb->usermeta WHERE user_id = '$post->post_author' AND meta_key = 'nickname'"); echo $the_author; ?><?php _e("'s articles",TEMPLATE_DOMAIN); ?>.</p>
		<?php } ?>
		<?php if(is_day()) { ?>
				<h1 class="post-title"><?php _e("Daily Archive",TEMPLATE_DOMAIN); ?></h1>
			</div>
			<div class="post-content">
				<p><?php _e('You are currently browsing the',TEMPLATE_DOMAIN);?> <?php _e("daily",TEMPLATE_DOMAIN); ?> <?php _e('Archive for',TEMPLATE_DOMAIN);?> <?php the_time(__('F jS, Y')); ?>.</p>
		<?php } ?>
		<?php if(is_month()) { ?>
				<h1 class="post-title"><?php _e("Monthly Archive",TEMPLATE_DOMAIN); ?></h1>
			</div>
			<div class="post-content">
				<p><?php _e('You are currently browsing the',TEMPLATE_DOMAIN);?> <?php _e("monthly",TEMPLATE_DOMAIN); ?> <?php _e('Archive for',TEMPLATE_DOMAIN);?> <?php the_time('F, Y'); ?>.</p>
		<?php } ?>
		<?php if(is_year()) { ?>
				<h1 class="post-title"><?php _e("Yearly Archive",TEMPLATE_DOMAIN); ?></h1>
			</div>
			<div class="post-content">
				<p><?php _e('You are currently browsing the',TEMPLATE_DOMAIN);?> <?php _e("yearly",TEMPLATE_DOMAIN); ?> <?php _e('Archive for',TEMPLATE_DOMAIN);?> <?php the_time('Y'); ?>.</p>
		<?php } ?>
		<?php if(is_search()) { ?>
				<h1 class="post-title"><?php _e('Search Results',TEMPLATE_DOMAIN);?></h1>
			</div>
			<div class="post-content">
				<p><?php _e("You searched for",TEMPLATE_DOMAIN); ?> '<?php echo $s; ?>'.</p>
		<?php } ?>
			</div>
		</div>
<?php } ?>

<?php if (is_single() || is_page()) { while (have_posts()) { the_post(); ?>
	<div class="entry<?php if (is_page()) { echo " static"; } ?>">
		<div class="post-meta">
			<h1 class="post-title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
			<?php if (is_single()) { ?><p class="post-metadata"><?php the_time(get_option('date_format')) ?><?php if(!get_option('tarski_hide_categories')) { ?> <?php _e('in',TEMPLATE_DOMAIN);?> <?php the_category(', '); ?><?php } ?><?php /* If there is more than one author, show author's name */ $count_users = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->usermeta WHERE `meta_key` = '" . $table_prefix . "user_level' AND `meta_value` > 1"); if ($count_users > 1) { ?> <?php _e('by',TEMPLATE_DOMAIN);?> <?php the_author_posts_link(); ?><?php } ?><?php edit_post_link(__('Edit',TEMPLATE_DOMAIN),' (',')'); ?></p><br /> <?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', '<br />'); ?><?php } ?>
		</div>
		<div class="post-content">

			<?php the_content(__('Read the rest of this entry &raquo;',TEMPLATE_DOMAIN)); ?>
			
		</div>
		<?php if (is_page()) { edit_post_link(__('edit page',TEMPLATE_DOMAIN), '<p class="post-metadata">(', ')</p>'); } ?>
	</div>
	<?php } } else { while (have_posts()) { the_post(); ?>
	<div class="entry">
		<div class="post-meta">
			<h2 class="post-title" id="post-<?php the_ID(); ?>"><?php if(!is_single()) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a><?php } else { the_title(); } ?></h2>
			<p class="post-metadata"><?php the_time(get_option('date_format')) ?><?php if(!get_option('tarski_hide_categories')) { ?> <?php _e('in',TEMPLATE_DOMAIN);?> <?php the_category(', '); ?><?php } ?><?php the_tags( '&nbsp;' . __( 'and tagged',TEMPLATE_DOMAIN ) . ' ', ', ', ''); ?><?php /* If there is more than one author, show author's name */ $count_users = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->usermeta WHERE `meta_key` = '" . $table_prefix . "user_level' AND `meta_value` > 1"); if ($count_users > 1) { ?> <?php _e('by',TEMPLATE_DOMAIN);?> <?php the_author_posts_link(); } ?> | <?php comments_popup_link(__('No comments',TEMPLATE_DOMAIN), __('1 comment',TEMPLATE_DOMAIN), __('% comments',TEMPLATE_DOMAIN), '', __('Comments closed',TEMPLATE_DOMAIN)); ?><?php edit_post_link(__('Edit',TEMPLATE_DOMAIN),' (',')'); ?></p>
		</div>

		<div class="post-content">
			<?php the_content(__('Read the rest of this entry &raquo;',TEMPLATE_DOMAIN)); ?>
		</div>
	</div>
<?php } } ?>
</div>
<?php } else { ?>
	<div id="primary">
		<div class="entry static">
			<div class="post-meta">
				<h1 class="post-title" id="error-404"><?php _e("Error 404",TEMPLATE_DOMAIN); ?></h1>
			</div>

			<div class="post-content">
				<p><?php _e("The page you are looking for does not exist; it may have been moved, or removed altogether. You might want to try the search function. Alternatively, return to the",TEMPLATE_DOMAIN); ?> <a href="<?php echo get_settings('home'); ?>"><?php _e("front page",TEMPLATE_DOMAIN); ?></a>.</p>
			</div>
		</div>
	</div>
<?php } ?>
