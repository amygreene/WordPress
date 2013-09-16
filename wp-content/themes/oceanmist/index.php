<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
   	<?php $post = $posts[0]; // Thanks Kubrick for this code ?>

		<?php if (is_category()) { ?>
		<h2><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php single_cat_title(); ?></h2>

 	  	<?php } elseif (is_tag()) { ?>
		<h2><?php _e('Posts tagged with', TEMPLATE_DOMAIN); ?> <?php single_tag_title(); ?></h2>

 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F j, Y'); ?></h2>

	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive', TEMPLATE_DOMAIN); ?></h2>


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
		<h2><?php _e('Search Results', TEMPLATE_DOMAIN); ?></h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
				
			<div class="postwrapper wideposts" id="post-<?php the_ID(); ?>">
			  <div class="title">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                   <small><?php _e("Posted by:",TEMPLATE_DOMAIN); ?> <strong><?php the_author_posts_link() ?></strong> | <?php the_time(get_option('date_format')) ?> <span class="comment-a"><?php comments_popup_link(__('| No Comment',TEMPLATE_DOMAIN), __('| 1 Comment',TEMPLATE_DOMAIN), __('| % Comments',TEMPLATE_DOMAIN)); ?></span> | <?php edit_post_link(__('(edit)',TEMPLATE_DOMAIN)); ?></small>

			  </div>
			  <div class="post">
			    <div class="entry">

       <?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

	<?php the_content(__('Read More...',TEMPLATE_DOMAIN)); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>




	</div>


                <div class="entry-cat">
                <?php _e('under:',TEMPLATE_DOMAIN); ?>&nbsp;<?php the_category(', ') ?><br />
                <?php if(function_exists("the_tags")) : ?><?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', '<br />'); ?><?php endif; ?>
                </div>

			  </div>
			</div>
	
		<?php endwhile; ?>
		<p align="center"><?php posts_nav_link(' - ',__('&#171; Newer Posts',TEMPLATE_DOMAIN),__('Older Posts &#187;',TEMPLATE_DOMAIN)) ?></p>
	<?php else : ?>

		<div class="title">
		  <h2><?php _e("Not Found",TEMPLATE_DOMAIN); ?></h2>
		</div>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	<div class="title">
	  <h2><?php _e("Categories",TEMPLATE_DOMAIN); ?></h2>
	</div>
	<div class="post">
	  <ul class="catlist">
        <?php wp_list_cats('sort_column=name&hide_empty=0'); ?>	
	  </ul>
	</div>
  </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
