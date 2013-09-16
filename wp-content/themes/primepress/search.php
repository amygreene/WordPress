<?php get_header(); ?>
<div id="primary" class="looped">
<?php if( have_posts() ) : ?>
<h1 class="page-title"><?php _e("Search Results for", 'primepress'); ?>&nbsp;<?php echo the_search_query(); ?></h1>
<?php while( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php if (function_exists('post_class')) { post_class('entry'); } else { echo 'class="entry hentry"'; } ?>>



			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permalink to', 'primepress'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>



            <div class="entry-byline">

				<span class="entry-date"><abbr class="updated" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('M jS, Y'); ?></abbr></span>

				<address class="author vcard"><?php _e('by ', 'primepress'); ?><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author(); ?></a>. </address>

				<?php comments_popup_link(__('No comments yet', 'primepress'), __('1 comment', 'primepress'), __('% comments', 'primepress'), 'comments-link', __('Comments are off for this post', 'primepress')); ?>

				<?php edit_post_link(__('Edit', 'primepress'), '[', ']'); ?>

			</div>



			<div class="entry-content">

				<?php the_excerpt(); ?>

			</div>

		</div>


		<?php endwhile; ?>



		<?php include (TEMPLATEPATH . '/navigation.php'); ?>



		<?php else : ?>



		<div class="entry">

			<h1 class="page-title"><?php _e('No posts found. Try a different search', 'primepress'); ?></h1>

			<div class="entry-content">

			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			</div>

		</div>



		<?php endif; ?>



	</div>



<?php get_sidebar(); ?>



<?php get_footer(); ?>