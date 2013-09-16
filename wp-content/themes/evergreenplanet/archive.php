<?php get_header();?>

<div id="content" class="subcontainer fleft">

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<div class="breadcrumb"><a href="<?php echo get_option('home'); ?>/">Home</a> &raquo; Category &raquo; <?php echo(get_category_parents($cat, TRUE, ' &raquo; ')); ?>	</div>
		<h2 class="mainhead cate">Archive: <?php single_cat_title(); ?></h2>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="mainhead cate">Posts Tagged: <?php single_tag_title(); ?></h2>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="mainhead">Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="mainhead">Archive for <?php the_time('F, Y'); ?></h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="mainhead">Archive for <?php the_time('Y'); ?></h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="mainhead">Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="mainhead">Blog Archives</h2>
	<?php } ?>

	<ul id="excerpt">
		<?php while (have_posts()) : the_post(); ?>
		<li> 
			 <div class="p_coleft fleft">
				 <p class="date_s"><?php the_time('M d, Y') ?></p>
				 <span class="comment_s"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
			 </div>
		 	
		 	<div class="p_coright fright">		
				<h1 class="prevtitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				<?php kreative_excerpt('55') ;?>
			</div>
			
			<br class="clear" />
		</li>
		<?php endwhile; ?>
	</ul>
	
	<?php else : ?>
		<h2 class="mainhead">Post not found!</h2>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif ;?>
 
	<?php kreative_pagenavi(); ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>