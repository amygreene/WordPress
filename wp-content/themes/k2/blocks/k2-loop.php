<?php
/**
 * Default Loop Template
 *
 * This file is loaded by multiple files and used for generating the loop
 *
 * @package K2
 * @subpackage Templates
 */

// Post index for semantic classes
$post_index = 1;



if (is_author()) { ?>
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
           <?php }

while ( have_posts() ): the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-head">
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
			</h3>

			<?php /* Edit Link */ edit_post_link( __('Edit','k2_domain'), '<span class="entry-edit">', '</span>' ); ?>

			<?php if ( 'post' == $post->post_type ): ?>
			<div class="entry-meta">
				<?php k2_entry_meta(1); ?>
			</div> <!-- .entry-meta -->
			<?php endif; ?>

			<?php /* K2 Hook */ do_action('template_entry_head'); ?>
		</div><!-- .entry-head -->

		<div class="entry-content">

        <?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

	<?php the_content( sprintf( __('Continue reading \'%s\'', 'k2_domain'), the_title('', '', false) ) ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } ?>



		</div><!-- .entry-content -->

		<div class="entry-foot">
			<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','k2_domain') . '</span>', 'after' => '</div>' ) ); ?>

			<?php if ( 'post' == $post->post_type ): ?>
			<div class="entry-meta">
				<?php k2_entry_meta(2); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php /* K2 Hook */ do_action('template_entry_foot'); ?>
		</div><!-- .entry-foot -->
	</div><!-- #post-ID -->

<?php endwhile; /* End The Loop */ ?>
