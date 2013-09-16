<ul>


<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
</ul>

<h2><?php _e('Links','connections'); ?></h2>
<ul><?php get_links('-1', '<li>', '</li>', ' '); ?></ul>
<h2><?php _e('Pages','connections');?></h2>
<ul><?php wp_list_pages('title_li=' ); ?></ul>
<h2><?php _e('Categories:','connections'); ?></h2>
	<ul><?php wp_list_cats('sort_column=name&optioncount=1');    ?></ul>

<h2><label for="s"><?php _e('Search:','connections'); ?></label></h2>
	<ul>
		<li>
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
				<div style="text-align:center">
					<p><input type="text" name="s" id="s" size="15" /></p>
					<p><input type="submit" name="submit" value="<?php _e('Search','connections'); ?>" /></p>
				</div>
			</form>
		</li>
	</ul>
<h2><?php _e('Monthly:','connections'); ?></h2>
	<ul><?php wp_get_archives('type=monthly&show_post_count=true'); ?></ul>

<?php endif; ?>
</ul>