<header id="banner" class="navbar navbar-fixed-top" role="banner">
  <?php roots_header_inside(); ?>
  <div class="navbar-inner">
    <div class="<?php echo WRAP_CLASSES; ?>">
     <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="seeds-social-icons">
        <ul class="seeds-social">
          <li><a class="seeds-facebook" href="http://www.facebook.com/evergreencomputercenter" title="Facebook" target="_blank">Facebook</a></li>
          <li><a class="seeds-twitter" href="http://twitter.com/tesc_compcenter" title="Twitter" target="_blank">Twitter</a></li>
          <li><a class="seeds-google" href="http://plus.google.com/b/102580020876069865868/102580020876069865868" title="Google Plus" target="_blank">Google Plus</a></li>
          <li class="seeds-social-last"><a class="seeds-rss" href="<?php bloginfo('rss2_url'); ?>" title="RSS" target="_blank">RSS</a></li>
        </ul>    
      </div>
      <!-- <a class="brand" href="<?php echo home_url(); ?>/">
        <?php bloginfo('name'); ?>
      </a> -->
      <nav id="nav-main" class="nav-collapse pull-right" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Navbar_Nav_Walker(), 'menu_class' => 'nav')); ?>
      </nav>
    </div>
  </div>
</header>