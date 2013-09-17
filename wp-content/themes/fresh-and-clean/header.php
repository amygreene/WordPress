<?php $options = get_option( 'fresh_theme_settings' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    
<!-- Styles & Favicon -->
<link rel="icon" type="image/png" href="<?php echo $xs_favicon; ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<!-- JS & WP Head -->
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>

<? if ( is_front_page() ) { ?>
<!-- nivoslider -->
<script type="text/javascript">
jQuery(function($){
$(window).load(function() {
//homepage Slider
	$('#slider').nivoSlider({
		directionNav: true,
		directionNavHide: true,
		captionOpacity: 0.8,
		controlNav: false,
		boxCols: 8,
		boxRows: 4,
		slices: 15,
		effect:'<?php if($options['effect'] != '') { echo $options['effect']; } else { echo 'fade'; } ?>',
		animSpeed: <?php if($options['anim_speed'] != '') { echo $options['anim_speed']; } else { echo 500; } ?>,
		pauseTime: <?php if($options['pause_time'] != '') { echo $options['pause_time']; } else { echo 3000; } ?>
	});
	});
});
</script>
<? } ?>

<!-- Superfish Navigation Menu -->
<script> 
jQuery(function($){
    $(document).ready(function() { 
        $('ul.sf-menu').superfish({ 
            delay: 100,
            animation: {opacity:'show',height:'show'},
			speed: 'normal',
            autoArrows:  false,
            dropShadows: true
        }); 
    }); 
});
</script>

<?php 
// Get And Show Analytics Code 
echo stripslashes($options['analytics']); 
?>

</head>
<body>
<div id="header">
  <div id="header-logo">
 			 <?php if($options['logo'] !='') { ?>
            	<a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><img src="<?php echo $options['logo']; ?>" alt="<?php bloginfo( 'name' ) ?>" /></a>
           	 <?php } else { ?>
            	<?php if (is_front_page()) {?>
        			<h1><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h1>
                <?php } else { ?>
                	<h2><a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php bloginfo( 'name' ) ?></a></h2>
				<?php } ?>
        		<p id="header-description">
					<?php bloginfo( 'description' ) ?>
				</p>
                <?php } ?>
	</div><!-- /header-logo -->
    
		<?php if($options['header_ad'] != '') { ?>
            <div id="header-banner">
                <?php echo stripslashes($options['header_ad']); ?>
           </div><!-- END header-ad -->
       <?php } ?>
       
</div><!-- /header -->
<div id="primary-nav">
<?php wp_nav_menu(
	array(
		'theme_location' => 'primary',
		'sort_column' => 'menu_order',
		'menu_class' => 'sf-menu',
    	'fallback_cb' => 'default_menu' ) ); ?>
<div class="clear"></div>
</div><!-- /primary-nav -->
<div id="wrap">
<?php if (is_front_page()) {?>
<?php get_template_part( 'nivoslider' ) ?> 
<?php } ?>