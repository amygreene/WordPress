<?php get_header();?>
<div id="main">
	<div id="content">
	        <div class="post">
            <p class="box left">
              <span class="month">
                <?php echo date('M'); ?>
              </span>
              <span class="day">
                <?php echo date('d'); ?>
              </span>
              <span class="year">
                <?php echo date('Y'); ?>
              </span>
            </p>
            <h2 class="title"><?php _e('404 - The Server can not find it !',TEMPLATE_DOMAIN); ?></h2>
            <div class="entry">
              <p><?php _e('The post or the page that you are looking for, is not available at this time. It could have been moved / deleted.',TEMPLATE_DOMAIN); ?></p>
              <p><?php _e('Please browse through the archives / search through the site.',TEMPLATE_DOMAIN); ?></p>
      			</div>
            <p class="comments">
              <?php _e('Posted as "Not Found"',TEMPLATE_DOMAIN); ?>
            </p>
	        </div>      
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>