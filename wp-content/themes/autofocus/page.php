<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>
			<div id="post-<?php the_ID(); ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title(); ?></h2>
				<div class="entry-content">
<?php the_content() ?>

<?php wp_link_pages("\t\t\t\t\t<div class='page-link'>".__('Pages: ', 'sandbox'), "</div>\n", 'number'); ?>

				</div>

				<div class="entry-meta">
<?php edit_post_link(__('Edit', 'sandbox'),'<span class="edit-link">','</span>') ?>
				</div>

			</div><!-- .post -->

<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>  

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>