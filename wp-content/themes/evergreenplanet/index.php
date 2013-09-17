<?php get_header(); ?>
	<div id="content" class="subcontainer fleft">
	
			<?php include (TEMPLATEPATH . '/functions/brightsky-topbox.php'); ?>

			<ul id="highlight">

	<?php 
			$kt =& get_instance();
			$highlight_posts = $kt->config->item('highlight_posts', 'layout');
			$home_query = $kt->config->item('home_advanced_query', 'layout');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			query_posts($query_string . $home_query);
			$count = 0;
			$prev = FALSE;

			if (have_posts()) : while (have_posts()) : the_post(); $count++;

			if ($count === ($highlight_posts + 1)) : $prev = TRUE; ?>
				</ul><!-- end of #highlight -->

				<div id="prev">
					<h2 class="mainhead">Site News</h2>
					<ul id="excerpt">
			<?php endif; ?>

			<?php if ($count <= $highlight_posts) : /* show highlight */ ?>
			<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<div class="posthead">
					 <div class="maindate fleft">
						 <?php the_time('d') ?><br />
						 <span><?php the_time('M') ?> </span>
					 </div>	 

					<h1 class="maintitle fleft"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<br class="clear" />
				</div>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<p class="postinfo">
					<span class="category">Filed under - <?php the_category(', ') ?></span> 			 
					<span class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> so far. Add yours now</span>
				</p>
			</li>

			<?php else : /* show previous */ ?>
				<li> 
					 <div class="p_coleft fleft">
						 <p class="date_s"><?php the_time('M d, Y') ?></p>
						 <span class="comment_s"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
					 </div>

				 	<div class="p_coright fright">		
						<h1 class="prevtitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						</h1>
						<?php kreative_excerpt('55') ;?>
					</div>

					<br class="clear" />
				</li>

			<?php endif; ?>

		<?php endwhile; ?>

		<!-- 5 Start -->

		<?php else : ?>
			<?php include (TEMPLATEPATH . '/notfound.php'); ?><!-- Also added and edited notfound.php -->

		<?php endif; ?>
		<!-- Erro 5 End -->

		<?php if ($prev === TRUE) : ?>
			</ul></div>
		<?php endif; ?>
		<br class="clear" />
	 	<?php kreative_pagenavi();?>
		
	
</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>