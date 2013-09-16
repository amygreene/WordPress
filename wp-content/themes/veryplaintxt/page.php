<?php get_header() ?>

	<div id="container">
		<div id="content" class="hfeed">

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="<?php veryplaintxt_post_class() ?>">
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="entry-content">
<?php the_content() ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'veryplaintxt'), '</div>', 'number'); ?>

<?php edit_post_link(__('Edit this entry.', 'veryplaintxt'),'<p class="entry-edit">','</p>') ?>

				</div>
			</div><!-- .post -->

<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?> 

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>