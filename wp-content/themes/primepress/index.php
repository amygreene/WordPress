<?php get_header(); ?>

	

	<div id="primary" class="looped">

		

		<?php if(have_posts()) : ?>

		

		<?php while(have_posts()) : the_post(); ?>

		

		<div id="post-<?php the_ID(); ?>" <?php if (function_exists('post_class')) { post_class('entry'); } else {echo 'class="entry hentry"';} ?>>

			

			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></h2>



            <div class="entry-byline">

				<span class="entry-date"><abbr class="updated" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('M jS, Y'); ?></abbr></span>

				<address class="author vcard"><?php _e('by ', 'primepress'); ?><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author(); ?></a>. </address>

				<?php comments_popup_link(__('No comments yet', 'primepress'), __('1 comment', 'primepress'), __('% comments', 'primepress'), 'comments-link', __('Comments are off for this post', 'primepress')); ?>

				<?php edit_post_link(__('Edit', 'primepress'), '[', ']'); ?>

			</div>

			

			<div class="entry-content">

			 	<?php the_content(__('Continue reading...', 'primepress')); ?>

				<?php wp_link_pages('before=<p><strong>' . __('Pages:') . '</strong>&after=</p>'); ?>

			</div>

			

			<p class="entry-meta"><span class="entry-categories"><?php _e('Posted in: ', 'primepress'); ?><?php the_category(', '); ?>.</span><br />

			<?php if(function_exists('the_tags')) { ?>

				<span class="entry-tags"><?php the_tags('Tagged: ',' &middot; ','<br />'); ?></span>

			<?php } ?></p>

		</div><!--.entry-->

		

		<?php endwhile; ?>

		

		<?php include (TEMPLATEPATH . '/navigation.php'); ?>

		

		<?php else : ?>

		

		<div class="entry">

			<h2 class="entry-title"><?php _e('Not Found', 'primepress'); ?></h2>

			<div class="entry-content">

			<p><?php _e("Sorry, what you are looking for isn't here.", 'primepress'); ?></p>

			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			</div>

		</div>

		

		<?php endif; ?>	



	</div><!--#primary-->

	

<?php get_sidebar(); ?>



<?php get_footer(); ?>