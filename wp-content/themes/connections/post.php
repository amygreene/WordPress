<p class="post-date"><?php the_time(get_option('date_format')); ?></p>
<div class="post-info"><h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','connections');?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php _e('Posted by');?> <?php the_author(); ?> under <?php the_category(', '); ?> <?php the_tags( ' | ' . __( 'Tags','connections' ) . ': ', ', ', ' | '); ?><?php edit_post_link(__('(edit this)','connections')); ?><br/><?php comments_popup_link(__('No Comments','connections'), __('1 Comment','connections'), __('[%] Comments','connections')); ?>&nbsp;</div>
<div class="post-content">


<?php if( is_archive() || is_search() || is_category() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>

<?php } else { ?>

<?php the_content( __('<p>Click here to read more</p>', 'blue-moon') ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>

<?php } ?>
	
	<div class="post-info">
		<?php wp_link_pages(); ?>											
	</div>
	<div class="post-footer">&nbsp;</div>
</div>
