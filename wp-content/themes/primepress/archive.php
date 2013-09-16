<?php get_header(); ?>

	

	<div id="primary" class="looped">

		

		<?php if(have_posts()) : ?>

		

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>

		<h1 class="page-title"><?php _e('Posts under', 'primepress'); ?> &#8216;<?php single_cat_title(); ?>&#8217;</h1>

		<?php /* If this is a tag archive */ } elseif(function_exists('is_tag')&& is_tag()) { ?>

		<h1 class="page-title"><?php _e('Posts Tagged', 'primepress'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>

		<h1 class="page-title"><?php _e('Posts on', 'primepress'); ?> &#8216;<?php the_time('F jS, Y'); ?>&#8217;</h1>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

		<h1 class="page-title"><?php _e('Posts from', 'primepress'); ?> &#8216;<?php the_time('F, Y'); ?>&#8217;</h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>


		<h1 class="page-title"><?php _e('Posts in', 'primepress'); ?> &#8216;<?php the_time('Y'); ?>&#8217;</h1>


       <?php /* If this is a yearly archive */ } elseif (is_author()) { ?>


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

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

		<h1 class="page-title"><?php _e('Blog Archives', 'primepress'); ?></h1>

		<?php } ?>

		

		<?php while(have_posts()) : the_post(); ?>

		

		<div id="post-<?php the_ID(); ?>" <?php if (function_exists('post_class')) { post_class('entry'); } else {echo 'class="entry hentry"';} ?>>

			

			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permalink to', 'primepress'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			

			<div class="entry-byline">

				<span class="entry-date"><abbr class="updated" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('M jS, Y'); ?></abbr></span>

				<address class="author vcard"><?php _e('by ', 'primepress'); ?><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author(); ?></a>. </address>

				<?php comments_popup_link(__('No comments yet', 'primepress'), __('1 comment', 'primepress'), __('% comments', 'primepress'), 'comments-link', __('Comments are off for this post', 'primepress')); ?>

				<?php edit_post_link(__('Edit', 'primepress'), '[', ']'); ?>

			</div>

			

			<div class="entry-content">

		 <?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content( __('<p>Click here to read more</p>','primepress') ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>

			</div>

		</div><!--.entry-->

		

		<?php endwhile; ?>

		

		<?php include (TEMPLATEPATH . '/navigation.php'); ?>

		

		<?php endif; ?>	



	</div><!--#primary-->

	

<?php get_sidebar(); ?>



<?php get_footer(); ?>