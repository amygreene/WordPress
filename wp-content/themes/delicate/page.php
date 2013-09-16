<?php get_header();
$t_show_sidebar = nattywp_get_option("t_show_sidebar");
?> 
<div id="main">		
	<div class="columns">      
    <div class="narrowcolumn singlepage <?php echo $t_show_sidebar; ?>">
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div class="post">            	
          <div class="title"><h2><?php the_title(); ?></h2></div>                
          <div class="entry">
               <?php t_show_video($post->ID); ?>
               <?php the_content(); ?>    
               <div class="clear"></div>
          </div>   
				<p class="postmetadata">	               
  <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'delicate' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  <?php edit_post_link(__('Edit','delicate'), '<p>', '</p>'); ?>	
				</p>                   
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>				
</div> <!-- END Narrowcolumn -->

<?php if ($t_show_sidebar == 'disable') {} else { ?>
  <div id="sidebar" class="profile <?php echo $t_show_sidebar; ?>">
      <?php if (!is_active_sidebar(2)) {
           get_sidebar(); 
         } else {
           echo '<ul>';
           dynamic_sidebar('sidebar-2');
           echo '</ul>';
         } ?>
  </div>
<?php } ?>
<div class="clear"></div>
<?php get_footer(); ?> 