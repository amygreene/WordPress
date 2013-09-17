<?php get_header(); ?>

	<div id="content">


				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div class="postwrapper wideposts" id="post-<?php the_ID(); ?>">


             <div class="title">

				<h2><?php the_title(); ?></h2>

                   <small><?php _e("Posted by:",TEMPLATE_DOMAIN); ?> <strong><?php the_author_posts_link() ?></strong> | <?php the_time(get_option('date_format')) ?> <span class="comment-a"><?php comments_popup_link(__('| No Comment',TEMPLATE_DOMAIN), __('| 1 Comment',TEMPLATE_DOMAIN), __('| % Comments',TEMPLATE_DOMAIN)); ?></span> | <?php edit_post_link(__('(edit)',TEMPLATE_DOMAIN)); ?></small>

			  </div>



			  <div class="post">
			    <div class="entry">
                       <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
			      <?php the_content(''); ?>
				         <?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
				  <?php wp_link_pages('<p class="pages">Pages: ', '</p>', '', '', '', ''); ?>
		        </div>

                <div class="entry-cat">
                <?php _e('under:',TEMPLATE_DOMAIN); ?>&nbsp;<?php the_category(', ') ?><br />
                <?php if(function_exists("the_tags")) : ?><?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', '<br />'); ?><?php endif; ?>
                </div>


			  </div>


		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

			</div>

	<?php comments_template('',true); ?>

	<?php endwhile; else: ?>
	
		<div class="title">
		  <h2><?php _e("Not Found",TEMPLATE_DOMAIN); ?></h2>
		</div>
		<div class="post">
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here.",TEMPLATE_DOMAIN); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	    </div>
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
