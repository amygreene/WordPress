<?php get_header(); ?>

<body id="body-single">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
	
<div id="intro">
	
	<span id="post-id"><?php the_ID(); ?></span>
	
	<div id="identity">
		
		<h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<div id="main-nav">
			<ul>
			<?php
				wp_list_pages('title_li=&sort_column=menu_order&depth=1');
			?>
			</ul>
		</div>
		
	</div>
		
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	
	<span class="clearer"></span>

</div>

<div id="summary">

	<div class="post-summary">
	
		<h2 class="post-title"><?php the_title(); ?></h2>

<?php if ( function_exists('supporter_hide_ads') ) { if ( !supporter_hide_ads() ) { ?><br />
<script type="text/javascript"><!--
google_ad_client = "pub-3374715123484136";
/* 468x60, nocolor, created 3/3/08 */
google_ad_slot = "0492718371";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
 <?php
}
}
?>

		<?php the_excerpt(); ?>
	</div>	
	
	<!--[if lt IE 7]>
	<div id="ie6only">
	<![endif]-->
	
	<ul id="post-info">
		<li><?php _e("Post Information",TEMPLATE_DOMAIN); ?>
			<ul>
				<li id="post-meta">
					<span class="post-date"><?php _e("Date:",TEMPLATE_DOMAIN); ?> <strong><?php the_time('l, F d, Y'); ?></strong></span>
					<span class="post-time"><?php _e("Time:",TEMPLATE_DOMAIN); ?> <em><?php the_time(); ?></em></span>
					<span class="post-category"><?php _e("Category:",TEMPLATE_DOMAIN); ?> <?php the_category(', '); ?>
					<span class="post-category"><?php the_tags( '' . __( 'Tagged',TEMPLATE_DOMAIN ) . ' ', ', ', ''); ?></span>
					<span>Discussion: <strong><a id="post-comment-link" href="#post-comments"><?php comments_number(__('0 Comments',TEMPLATE_DOMAIN),__('1 Comment',TEMPLATE_DOMAIN),__('% Comments',TEMPLATE_DOMAIN)); ?></a></strong></span>
				</li>
			</ul>
		</li>
	</ul>

	<ul id="post-nav">
		<li><?php _e("Post Navigation",TEMPLATE_DOMAIN); ?>
			<ul>
				<li class="nav-prev-post"><?php previous_post_link('&laquo; %link') ?></li>
				<li class="nav-next-post"><?php next_post_link('%link &raquo;') ?></li>
			</ul>
		</li>
	</ul>
	
	<!--[if lt IE 7]>
	</div>
	<![endif]-->
	<span class="clearer"></span>

</div>	

<div id="post-content">
<!--[if IE]>
<div id="ie-post-content-inner">
<![endif]-->

<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>

 <?php the_content(); ?>

<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<!--[if IE]>
</div>
<![endif]-->
</div>
<span class="clearer"></span>
<div id="discussion-area">

	<div id="post-comments">	
		<?php comments_template('',true); ?>
	</div>
	
</div>
	
<?php endwhile; ?>

<?php else : ?>

	<h2><?php _e('Not Found',TEMPLATE_DOMAIN);?></h2>
	<p><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN);?></p>

<?php endif; ?>

<?php get_footer(); ?>
