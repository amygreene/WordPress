<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;
	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'delicate' ), max( $paged, $page ) );
	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php 
  $t_show_slideshow = nattywp_get_option( "t_show_slideshow" );  
  $t_scroll_pages = nattywp_get_option( "t_scroll_pages" );
  $t_show_search = nattywp_get_option( "t_show_search" );
?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="content-pad">
<div id="header">
	<?php nattywp_get_logo ('<div id="logo">', '</div>', 'logo.gif', true); ?>
	<?php if ($t_show_search == 'yes' || $t_show_search == 'no') { ?>     
  <div id="top_search"> 
      <?php get_search_form(); ?>
  </div>
  <?php } ?>
</div>

<div class="top">
    <div id="menu">	
       <?php delicate_show_navigation ('primary', 'delicate_show_pagemenu'); ?>
    </div>                
</div> <!-- END top -->
<div class="clear"></div>
<div class="head-img">
  <?php if ($t_show_slideshow == 'hide') {}
  elseif ($t_show_slideshow == 'pag' || !isset($t_show_slideshow) || $t_show_slideshow == 'no') { // Display Slideshow ?>  
  <div class="slideshow-bg module">
    <div class="slideshow">
      <?php if ($t_scroll_pages == 'no' || $t_scroll_pages[0] == 'no' || $t_scroll_pages[0] == ''){
        echo '<div><div class="tagline">'.__('Welcome to Delicate template', 'delicate').'</div><img src="'.get_template_directory_uri().'/images/header/headers.jpg" alt="Header" /></div>';
        echo '<div><div class="tagline">'.__('Just another WordPress site', 'delicate').'</div><img src="'.get_template_directory_uri().'/images/header/header.jpg" alt="Header" /></div>';
      } else {
        foreach ($t_scroll_pages as $ad_pgs ) { 
         query_posts('page_id='.$ad_pgs ); while (have_posts()) : the_post(); ?>
      <div>
        <div class="tagline"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('slide-thumb');} // 970x225 ?>
      </div>
      <?php endwhile; wp_reset_query(); ?>	
      <?php } //end foreach ?>  
    <?php } ?>  
    </div><!-- END Slideshow -->
    <div id="slideshow-nav"></div>
  </div> <!-- END slideshow-bg -->

  <?php } else { // Display Header Image    
    $header_image = get_header_image();
    if ( !empty( $header_image ) ) : ?>
      <div class="tagline"><?php bloginfo('description'); ?></div>
      <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header" />
    <?php endif;     
  } // End if ?>
</div>
<!-- END Header -->