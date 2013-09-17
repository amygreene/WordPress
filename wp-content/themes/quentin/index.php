<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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

<style type="text/css" media="screen"> @import url( <?php bloginfo ('stylesheet_url' ); ?>  ); </style>
	
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>

<body>

<div id="rap">
<div id="header">
<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<h3 class="description"><?php bloginfo('description'); ?></h3>
</div>


<div id="content">

<?php if (have_posts()) : ?>

<?php load_template( TEMPLATEPATH . '/headline.php' ); ?> 

<?php while ( have_posts()) : the_post(); ?>


<div class="post">
<h2 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:',TEMPLATE_DOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

	
<div class="storycontent">
<div align="center"></div>


<?php if( is_date() || is_search() || is_tag() || is_author() ) { ?>

<?php if(function_exists('the_post_thumbnail')) { ?><?php if(get_the_post_thumbnail() != "") { ?><div class="alignleft">
<?php the_post_thumbnail(); ?></div><?php } } ?>
<?php the_excerpt();?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>
<?php } else { ?>

<?php the_content( __('<p>Click here to read more</p>',TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>
<?php if (function_exists('wp_ozh_wsa')) { wp_ozh_wsa("336280nocolor"); } ?>

<?php } ?>


<div align="center"></div>
</div>

<?php if (!is_page()) { ?>
<div class="meta">
<?php _e("Published in:",TEMPLATE_DOMAIN); ?> <?php the_category(', ') ?> <?php _e('on',TEMPLATE_DOMAIN);?> <?php the_date('','',''); ?> <?php _e('at',TEMPLATE_DOMAIN);?>
<?php the_time() ?> <?php comments_popup_link(__('Comments (0)',TEMPLATE_DOMAIN), __('Comments (1)',TEMPLATE_DOMAIN), __('Comments (%)',TEMPLATE_DOMAIN)); ?>
<br />
<?php the_tags(__('Tags: ',TEMPLATE_DOMAIN), ', ', '<br />'); ?>
</div>
<?php } ?>


<img src="<?php bloginfo('stylesheet_directory'); ?>/images/printer.gif" width="102" height="27" class="pmark" alt=" " />


<div class="feedback">
<?php wp_link_pages(); ?>
</div>

<?php if( !is_page() ) { ?>
<?php comments_template ('',true); ?>
<?php } else { ?>
<?php if ( comments_open() ) { ?> <?php comments_template('',true); ?><?php } ?>
<?php } ?>

</div>

<?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Entries',TEMPLATE_DOMAIN)) ?></div>
		<div class="alignright"><?php previous_posts_link(__('Next Entries &raquo;',TEMPLATE_DOMAIN)) ?></div>
	</div>

<?php else: ?>
<p><?php _e('Sorry, no posts matched your criteria.',TEMPLATE_DOMAIN); ?></p>
<?php endif; ?>
</div>



<div id="menu">

<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<li id="calendar">
	<?php get_calendar(); ?>
</li> 
<li id="search">
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
<input type="text" name="s" id="s" size="8" /> <input type="submit" name="submit" value="<?php _e('Search',TEMPLATE_DOMAIN); ?>" id="sub" />
</form>
</li>




<li id="categories"><?php _e('Categories:',TEMPLATE_DOMAIN); ?>
	<ul>
	<?php wp_list_cats(); ?>
	</ul>
</li>
 


<li id="archives"><?php _e('Archives:',TEMPLATE_DOMAIN); ?>
 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>
</li>


<?php get_links_list(); ?>
 

<?php endif; ?>
</ul>

</div> 

<div id="footer">
<p class="credit">

<cite>&copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?>&nbsp;&nbsp;&nbsp;<?php _e('Powered by',TEMPLATE_DOMAIN); ?> <a href="http://wpmu.org">WordPress MU</a><br />
<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS',TEMPLATE_DOMAIN); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> 2.0',TEMPLATE_DOMAIN); ?></a>
| <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS',TEMPLATE_DOMAIN); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr> 2.0',TEMPLATE_DOMAIN); ?></a><br />
Theme: <a href="http://www.pikemurdy.com/quentin" rel="designer"><em>Quentin</em></a>. <?php if(function_exists('get_current_site')) { $current_site = get_current_site(); ?>
<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>
<?php } ?>
<br /><?php wp_footer(); ?>
</p>


</div></div>



</body>
</html>
