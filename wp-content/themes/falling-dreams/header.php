<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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


<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );

<?php if('' != get_header_image() ) { ?>
h1#header {
 background: url(<?php header_image() ?>) no-repeat;
}
h1#header a {
color:#<?php header_textcolor() ?> !important;
text-decoration: none;
}
<?php } ?>
</style>


<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


<script language="javascript" src="<?php bloginfo('stylesheet_directory'); ?>/nicetitle.js"></script>
</head>
<body><div id="rap">

<h1 id="header" onclick="location.href='<?php bloginfo('url'); ?>';" style="cursor: pointer;"><a href="<?php bloginfo('url'); ?>">
  <br /><br /><?php bloginfo('name'); ?>
  </a></h1>
<!-- Create some pages in WP Admin, and put links here. (Ex: About, Photos, Contact etc) -->
<div id="navmenu"> </div><div id="content">
