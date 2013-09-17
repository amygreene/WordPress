<?php get_header(); ?>

<body id="body-archive">

<div id="intro">


    <?php if(is_home()) { ?>
    <span id="page-id"><?php _e("Home",TEMPLATE_DOMAIN); ?></span>
    <?php } elseif (is_date()) { ?>
	<span id="page-id"><?php _e("Archive",TEMPLATE_DOMAIN); ?></span>
    <?php } elseif (is_category()) { ?>
	<span id="page-id"><?php _e("Category",TEMPLATE_DOMAIN); ?></span>
     <?php } elseif (is_tag()) { ?>
	<span id="page-id"><?php _e("Tags",TEMPLATE_DOMAIN); ?></span>
     <?php } elseif (is_author()) { ?>
	<span id="page-id"><?php _e("Author",TEMPLATE_DOMAIN); ?></span>
     <?php } elseif (is_search()) { ?>
	<span id="page-id"><?php _e("Search",TEMPLATE_DOMAIN); ?></span>
    <?php } ?>










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
     	                        <?php if('' != get_header_image() ) { ?>
<a href="<?php bloginfo('url'); ?>"><img class="centered" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } ?>
<?php if (have_posts()) : ?>

<div id="summary">

	<div class="post-summary">

	  	<?php $post = $posts[0]; // Thanks Kubrick for this code ?>

		<?php if (is_category()) { ?>
		<h2 class="page-title"><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php single_cat_title(); ?></h2>

 	  	<?php } elseif (is_tag()) { ?>
		<h2 class="page-title"><?php _e('Posts tagged with', TEMPLATE_DOMAIN); ?> <?php single_tag_title(); ?></h2>

 	  	<?php } elseif (is_day()) { ?>
		<h2 class="page-title"><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F j, Y'); ?></h2>

	 	<?php } elseif (is_month()) { ?>
		<h2 class="page-title"><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2 class="page-title"><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2 class="page-title"><?php _e('Author Archive', TEMPLATE_DOMAIN); ?></h2>


      <?php if (is_author()) { ?>
       <?php if(isset($_GET['author_name'])) : $curauth = get_userdatabylogin($author_name); else : $curauth = get_userdata(intval($author)); endif; ?>
        <div id="author-block">

        <div class="alignleft"><?php echo get_avatar($curauth->user_email, '128', $avatar); ?></div>


        <div class="info">
        <p><strong><?php echo $curauth->display_name; ?></strong></p>
        <p>
        <?php if($curauth->user_description<>''): echo $curauth->user_description; else: _e("This user hasn't shared any biographical information",TEMPLATE_DOMAIN);
         endif; ?>
        </p>
         <?php
          if(($curauth->user_url<>'http://') && ($curauth->user_url<>'')) echo '<p class="im">'.__('Homepage:',TEMPLATE_DOMAIN).' <a href="'.$curauth->user_url.'">'.$curauth->user_url.'</a></p>';
          if($curauth->yim<>'') echo '<p class="im">'.__('Yahoo Messenger:',TEMPLATE_DOMAIN).' <a class="im_yahoo" href="ymsgr:sendIM?'.$curauth->yim.'">'.$curauth->yim.'</a></p>';
          if($curauth->jabber<>'') echo '<p class="im">'.__('Jabber/GTalk:',TEMPLATE_DOMAIN).' <a class="im_jabber" href="gtalk:chat?jid='.$curauth->jabber.'">'.$curauth->jabber.'</a></p>';
          if($curauth->aim<>'') echo '<p class="im">'.__('AIM:',TEMPLATE_DOMAIN).' <a class="im_aim" href="aim:goIM?screenname='.$curauth->aim.'">'.$curauth->aim.'</a></p>';
         ?>
         </div>
         </div>
           <?php } ?>

		<?php } elseif (is_search()) { ?>
		<h2 class="page-title"><?php _e('Search Results', TEMPLATE_DOMAIN); ?></h2>

		<?php } ?>

	</div>	

	<span class="clearer"></span>

</div>	

<?php while (have_posts()) : the_post(); ?>

<div id="post-content">

	<div class="archive-post">

		<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

	   <?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content( __('...Click here to read more',TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>

		<div class="archive-meta">
			<span class="archive-post-date-comment"><em><?php the_time('F d, Y'); ?></em> | <a class="archive-post-comment-link" href="<?php the_permalink(); ?>#post-comments"><?php comments_number(__('0 Comments', TEMPLATE_DOMAIN),__('1 Comment', TEMPLATE_DOMAIN),__('% Comments', TEMPLATE_DOMAIN)); ?></a></span>
			<span class="latest-continue"><a href="<?php the_permalink(); ?>" title="<?php _e('Continue reading', TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php _e('Continue reading', TEMPLATE_DOMAIN);?> &raquo;</a></span>
			<span class="clearer"></span>
            <p><?php printf(__('category: %s &nbsp;&nbsp;&nbsp; %s',TEMPLATE_DOMAIN), get_the_category_list(', '), get_the_tag_list(__('tags: '), ', ', ' ')); ?></p>
		</div>
	</div>
	
</div>

<?php endwhile; ?>

<?php else : ?>

	<h2><?php _e('Not Found', TEMPLATE_DOMAIN);?></h2>
	<p><?php _e("Sorry, but you are looking for something that isn't here.", TEMPLATE_DOMAIN);?></p>

<?php endif; ?>

<?php get_footer(); ?>
