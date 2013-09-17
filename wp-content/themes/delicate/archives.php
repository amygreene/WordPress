<?php
/*
Template Name: Archives
*/
?>
<?php get_header();
$t_show_sidebar = nattywp_get_option("t_show_sidebar");
?>   
<div id="main">		
	<div class="columns">       
    <div class="narrowcolumn singlepage <?php echo $t_show_sidebar; ?>">					
			<div class="post">
             <div class="title">
				<h2><?php bloginfo('name'); echo ' '; _e('Archives', 'delicate'); ?></h2>                
                </div>         
				<div class="entry">
                    <h3><?php _e('Archives by Month:','delicate'); ?></h3>
                    <div class="clear"></div> 
                    <ul class="arc">
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                    <br /><br />
                    <h3><?php _e('Archives by Subject:','delicate'); ?></h3>
                    <div class="clear"></div>        
                    <ul class="arc">
                         <?php wp_list_categories('title_li='); ?>
                    </ul>
                    <div class="clear"></div>                 
				</div>   				              
			</div>
	</div> <!-- END Narrowcolumn -->
<?php if ($t_show_sidebar == 'disable') {} else { ?>
  <div id="sidebar" class="profile <?php echo $t_show_sidebar; ?>">
   <?php get_sidebar();?>
  </div> 
<?php } ?>  
<div class="clear"></div>
<?php get_footer(); ?> 