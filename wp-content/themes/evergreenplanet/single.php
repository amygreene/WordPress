<?php get_header(); ?>

	<div id="content" class="subcontainer fleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		
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
			
			<p class="postinfo clear">
				<span class="category">Filed under - <?php the_category(', ') ?></span> 
				<span class="comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> so far.</span><br />
			</p>
			<p class="tag"><?php the_tags();?> </p>
			<p><?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?></p>
		</div>

	<?php endwhile; ?>

	<?php //Related posts section; showing 4 related postss with thumbnails ;?>
	<div class="related">
	<h3>Related entries</h3>
	
	<ul>
		<?php kreative_related_posts(4, 10, '<li>', '</li>'); ?> 
	</ul> 
	
 	
 <br class="clear" />
</div>
<?php comments_template('', true); ?>

<?php else : ?>
	<h2 class="mainhead">Post not found!</h2>
	<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>