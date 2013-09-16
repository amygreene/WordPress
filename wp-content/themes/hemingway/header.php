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

<meta name="generator" content="WordPress.com" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
	global $hemingway;
	if ($hemingway->style and $hemingway->style != 'none') :
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/<?= $hemingway->style ?>" type="text/css" media="screen" />

<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body>
	<div id="header">
		<div class="inside">
			<div id="search">
				<form method="get" id="sform" action="<?php bloginfo('home'); ?>/">
 					<div class="searchimg"></div>
					<input type="text" id="q" value="<?php echo wp_specialchars($s, 1); ?>" name="s" size="15" />
				</form>
			</div>
			
			<h2><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
			<p class="description"><?php bloginfo('description'); ?></p>
		</div>

<?php if('' != get_header_image() ) { ?>
<div id="custom-img-header"><a href="<?php bloginfo('url'); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
<?php } ?>



	</div>
	<!-- [END] #header -->
