<?php get_header(); ?>
<?php is_tag(); ?>

	<div id="primary" class="single-post">
	<div class="inside">
		<div class="primary">

			<?php if (have_posts()) : ?>

            <?php $post = $posts[0]; // Thanks Kubrick for this code ?>

		<?php if (is_category()) { ?>
		<h1><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php single_cat_title(); ?></h1>

 	  	<?php } elseif (is_tag()) { ?>
		<h1><?php _e('Posts tagged with', TEMPLATE_DOMAIN); ?> <?php single_tag_title(); ?></h1>

 	  	<?php } elseif (is_day()) { ?>
		<h1><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F j, Y'); ?></h1>

	 	<?php } elseif (is_month()) { ?>
		<h1><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('F, Y'); ?></h1>

		<?php } elseif (is_year()) { ?>
		<h1><?php _e('Archive for', TEMPLATE_DOMAIN); ?> <?php the_time('Y'); ?></h1>

		<?php } elseif (is_author()) { ?>
		<h1><?php _e('Author Archive', TEMPLATE_DOMAIN); ?></h1>


       <?php if (is_author()) { ?>
       <?php if(isset($_GET['author_name'])) : $curauth = get_userdatabylogin($author_name); else : $curauth = get_userdata(intval($author)); endif; ?>
        <div id="author-block">

        <div class="alignleft"><?php echo get_avatar($curauth->user_email, '128', $avatar); ?></div>


        <div class="info">
        <h1><?php echo $curauth->display_name; ?></h1>
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
		<h1><?php _e('Search Results', TEMPLATE_DOMAIN); ?></h1>

		<?php } ?>



		 <ul class="dates">
		 	<?php while (have_posts()) : the_post(); ?>
			<li>
				<span class="date"><?php the_time('m.j.y') ?></span>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				 <?php _e("posted in",TEMPLATE_DOMAIN); ?>
				<?php the_category(', ') ?>
				<?php if (is_callable('the_tags')) the_tags(__('tagged ',TEMPLATE_DOMAIN), ', '); ?>
			</li>

			<?php endwhile; ?>
		</ul>
		
		<div class="navigation">
			<div class="left"><?php next_posts_link(__('&laquo; Previous Entries',TEMPLATE_DOMAIN)) ?></div>
			<div class="right"><?php previous_posts_link(__('Next Entries &raquo;',TEMPLATE_DOMAIN)) ?></div>
		</div>

	
	<?php else : ?>

		<h1><?php _e("Not Found",TEMPLATE_DOMAIN); ?></h1>

	<?php endif; ?>
		
	</div>

	<div class="secondary">
		<h2><?php _e("About the archives",TEMPLATE_DOMAIN); ?></h2>
		<div class="featured">
			<p><?php _e("Welcome to the archives here at <?php bloginfo('name'); ?>. Have a look around.",TEMPLATE_DOMAIN); ?></p>
			
		</div>
	</div>
	<div class="clear"></div>
	</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
