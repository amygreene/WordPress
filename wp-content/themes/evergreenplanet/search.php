<?php get_header(); ?>
<div id="content" class="subcontainer fleft">

	<?php if (have_posts()) : ?>
		<h2 class="mainhead search">Search Results : <?php echo $s; ?></h2>
		<ul id="excerpt">
			<?php while (have_posts()) : the_post(); ?>
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
		<?php endwhile; ?>
		</ul>

	<?php else : ?>
		<h2 class="mainhead">No posts found. </h2>
			<p>Try a different search?</p>
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
			<div>
				<input type="text" size="18" value="" name="s" id="s" />
				<input type="submit" id="ksearchsubmit" value="Search" class="btn" />
			</div>
			<br class="clear" />
			</form>
	<?php endif; ?>
 	<?php kreative_pagenavi();?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>