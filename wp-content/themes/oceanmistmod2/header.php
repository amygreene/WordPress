<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php
if (is_home()) { echo bloginfo('name'); echo (' - '); bloginfo('description');}
elseif (is_404()) { bloginfo('name'); echo ' - Oops, this is a 404 page'; }
else if ( is_search() ) { bloginfo('name'); echo (' - Search Results');}
else { bloginfo('name'); echo (' - '); wp_title(''); }
?>
</title>

<?php include(TEMPLATEPATH . '/options.php'); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?10" type="text/css" media="screen" />


<?php print "<style type='text/css' media='screen'>"; ?>
<?php include (TEMPLATEPATH . '/fonts.php'); ?>
<?php print "</style>"; ?>



<!--[if !IE]>deleted this if you want the indexing for archives<![endif]-->


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- favicon.ico location -->
<?php if(file_exists( WP_CONTENT_DIR . '/favicon.ico')) { //put your favicon.ico inside wp-content/ ?>
<link rel="icon" href="<?php echo WP_CONTENT_URL; ?>/favicon.ico" type="images/x-icon" />
<?php } elseif(file_exists( WP_CONTENT_DIR . '/favicon.png')) { //put your favicon.png inside wp-content/ ?>
<link rel="icon" href="<?php echo WP_CONTENT_URL; ?>/favicon.png" type="images/x-icon" />
<?php } elseif(file_exists( TEMPLATEPATH . '/favicon.ico')) { ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="images/x-icon" />
<?php } elseif(file_exists( TEMPLATEPATH . '/favicon.png')) { ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="images/x-icon" />
<?php } ?>




<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cycle.js" type="text/javascript"></script>

<script type="text/javascript">
jQuery.noConflict();
var $jd = jQuery;
$jd(document).ready(function() {
$jd('#rotateimg').cycle({
    fx:    'fade',
	speed:    4000,
    timeout:  5000,
	pause: 1

 });
 });

</script>

<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<?php if( get_background_image() || get_theme_mod('preset_bg') ) { ?>
<style>
#header-top {
    background: transparent none !important;
}
</style>
<?php } ?>

</head>
<body id="custom">


<div id="wrapper">
<div id="wrapper-wrap">

<div id="header">
<div id="header-content">
<div id="header-top">
<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
<div class="description"><?php bloginfo('description'); ?>&nbsp;</div>
</div>


</div>
<div id="top-nav">
<div id="custom-navigation">
<?php if ( function_exists( 'wp_nav_menu' ) ) { // Added in 3.0 ?>
<ul id="nav">
<?php echo bp_wp_custom_nav_menu($get_custom_location='main-nav', $get_default_menu='revert_wp_menu_page'); ?>
</ul>
<?php } else { ?>
<ul id="nav">
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
<?php } ?>
</div>
</div>

</div>

<?php $show_image_rotate = "$oc_om_image_rotate_status"; ?>
<?php if($show_image_rotate==yes): ?>
<?php include (TEMPLATEPATH . '/rotate.php'); ?>
<?php else: ?>
<div id="thecustomimg">
<div id="mainpic"><img src="<?php header_image(); ?>" alt="header image"/></div>
</div>
<?php endif; ?>


<div id="page">
<div id="container">