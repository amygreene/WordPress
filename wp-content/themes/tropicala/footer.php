

    
      </div>

    </div>

    <ul id="footer" class="foot">
      <li>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</li>
<li><?php _e('RSS','tropicala'); ?>: <a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries','tropicala'); ?></a>/<a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments','tropicala'); ?></a></li>
      <li><?php _e("Powered by",'tropicala');?> <a href="http://wpmu.org">WPMU</a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<br /><?php _e('Hosted by', 'tropicala'); ?>
  <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>.&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?></li>
      <li>
        Theme:
        <a href="http://wordpress.org/extend/themes/tropicala">Tropicala</a> by 
        <a href="http://goroharumi.com">Goro</a>
      </li>
       <br />
     <?php wp_footer(); ?>
    </ul>

</body>
</html>
