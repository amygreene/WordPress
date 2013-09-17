<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php Kreative::htmlTitle(); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?>>

	<div id="nav">
	    <div class="container">
	        <ul><?php Kreative::siteNavigation(0); ?></ul>
	<ul class="site-login">
		<li><a href="/wp-login.php">Login</a> </li>
		</div>
	    </div>
	</div>
		
	<div id="header" class="clear">
	    <div class="container cheader">
	    	<?php Kreative::siteTitle(); ?>
	<form action="/site-search/" method="post" id="ksearchform">		
						<div>
							<input type="text" size="18" value="" name="phrase" id="s" />
							<input name="Submit" type="submit" id="ksearchsubmit" value="Search" class="btn" />
						</div>
						
	</form>
		</div>

	</div> <!-- end of #header -->
	<div id="navcat">
    	<div class="container">
    	<!--Error 4 Start -->	<ul><?php wp_list_categories('title_li='); ?></ul><!--Error 4 End -->
		</div>
	</div>
	<div class="clear"></div>
	
<div id="wrapper" class="container">
		