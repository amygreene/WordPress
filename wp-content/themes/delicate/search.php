<?php get_header();?>      

<?php 
$t_show_post = nattywp_get_option( "t_show_post" );
$t_show_sidebar = nattywp_get_option("t_show_sidebar");
?>    
<div id="main">		
	<div class="columns">      
     <div class="narrowcolumn <?php echo $t_show_sidebar; ?>">
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div <?php post_class();?>>            	
        <div class="title">
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <small><?php _e('Posted by','delicate'); ?> <span class="author"><?php delicate_get_profile() ?></span> <?php _e('in','delicate'); ?> <?php the_category(' | ');?> - (<?php comments_popup_link(__('0 Comments', 'delicate'), __('1 Comments', 'delicate'), __('% Comments', 'delicate')); ?>)</small> <?php edit_post_link(__('Edit','delicate'), ' | ', ''); ?>
                </div>                
				<div class="entry">				
					<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('thumbnail');} 
                 if ($t_show_post == 'no') {//excerpt 
                    the_excerpt();
                  } else { //fullpost 
                    t_show_video($post->ID); 
                     the_content();                 
                  } ?>
                    <div class="clear"></div>
                </div>              
                
				<p class="postmetadata">
           <span class="category"><?php the_tags('', ', ', ''); ?></span>   
				</p>
			</div>			
	<?php endwhile; ?>	
    		
		<div id="navigation">
      <?php nattywp_pagenavi(); ?>
		</div>    
        
    <?php else : ?>
		<div class="post">
		<h2><?php _e('Not Found','delicate'); ?></h2>
            <div class="entry"><p><?php _e('Sorry, but you are looking for something that isn\'t here.','delicate'); ?></p>
            <?php get_search_form(); ?>
            </div>
        </div>
	<?php endif; ?>	
    
</div> <!-- END Narrowcolumn -->
<?php if ($t_show_sidebar == 'disable') {} else { ?>
  <div id="sidebar" class="profile <?php echo $t_show_sidebar; ?>">
   <?php get_sidebar();?>
  </div> 
<?php } ?> 
<div class="clear"></div>    
<?php get_footer(); ?> 