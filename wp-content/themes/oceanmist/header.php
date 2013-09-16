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

<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


<script src="<?php bloginfo('stylesheet_directory');?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/cycle.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#rotateimg').cycle({
    fx:    'fade',
	speed:    4000,
    timeout:  5000,
	pause: 1

 });
 });

</script>


</head>
<body>


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
<ul id="pagetabs">
<li><a href="<?php bloginfo('url'); ?>" title="<?php _e("Home",TEMPLATE_DOMAIN); ?>"><?php _e("Home",TEMPLATE_DOMAIN); ?></a></li>
<?php wp_list_pages('title_li='); ?>
</ul>
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