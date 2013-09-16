<?php
/**
 * Custom theme Hooks.
 */
 
if (!isset($content_width))
	$content_width = 590;

$custom_width = (nattywp_get_option("t_head_width") == 'no') ? 970 : nattywp_get_option("t_head_width");
$custom_height = (nattywp_get_option("t_head_height") == 'no') ? 225 : nattywp_get_option("t_head_height");
define("DELICATE_HEADER_WIDTH", $custom_width);
define("DELICATE_HEADER_HEIGHT", $custom_height);

add_action( 'after_setup_theme', 'delicate_setup' );

if ( ! function_exists( 'delicate_setup' ) ):
  function delicate_setup() {
    // Localization
    load_theme_textdomain( 'delicate', get_template_directory() . '/languages' );
    
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
      require_once( $locale_file );

    /*
     * Theme Extension
     */
     add_editor_style();
     add_theme_support('automatic-feed-links');
     add_theme_support('post-thumbnails');
     add_theme_support('custom-background');
     add_image_size('slide-thumb', DELICATE_HEADER_WIDTH, DELICATE_HEADER_HEIGHT, true); //(cropped)
     
     register_nav_menu( 'primary', __( 'Primary Menu', 'delicate' ) );

    // Custom Header 
    $args = array(
      // Text color and image (empty to use none).
      'default-text-color'     => '333333',
      'default-image'          => '',

      // Set height and width, with a maximum value for the width.
      'height'                 => apply_filters( 'delicate_header_image_height', DELICATE_HEADER_HEIGHT ),
      'width'                  => apply_filters( 'delicate_header_image_width', DELICATE_HEADER_WIDTH ),
      'max-width'              => 2000,

      // Support flexible height and width.
      'flex-height'            => true,
      'flex-width'             => true,

      // Random image rotation off by default.
      'random-default'         => true,

      // Callbacks for styling the header and the admin preview.
      'wp-head-callback'       => 'delicate_header_style',
      'admin-head-callback'    => 'delicate_admin_header_style',
      'admin-preview-callback' => 'delicate_admin_header_image',
    );
    add_theme_support( 'custom-header', $args );
    register_default_headers (array(
        'blue' => array(
          'url' => '%s/images/header/headers.jpg',
          'thumbnail_url' => '%s/images/header/headers-thumbnail.jpg',
          'description' => __('Blue', 'delicate')
        ),
        'green' => array(
          'url' => '%s/images/header/header.jpg',
          'thumbnail_url' => '%s/images/header/header-thumbnail.jpg',
          'description' => __('Green', 'delicate')
        ),
    ));    
  }
endif; // delicate_setup


function delicate_styles() {
  wp_register_style('default', get_bloginfo('stylesheet_url'), array(), NULL);
  wp_register_style('delicate-ie7', get_template_directory_uri().'/ie7.css', array(), NULL);
 	wp_register_style('delicate-ie6', get_template_directory_uri().'/ie6.css', array(), NULL);
  wp_enqueue_style('default');
  wp_enqueue_style('delicate-ie7');
  wp_enqueue_style('delicate-ie6');
  
  global $wp_styles;
  $wp_styles->add_data('delicate-ie7', 'conditional', 'IE 7');
  $wp_styles->add_data('delicate-ie6', 'conditional', 'IE 6');
}
add_action('wp_print_styles', 'delicate_styles'); // styles


function delicate_direct_styles() { 
  include (get_template_directory() . '/style.php');
  echo "<!--[if IE 6]><style type=\"text/css\">
            img.png {
            filter: expression(
            (runtimeStyle.filter == '') ? runtimeStyle.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='+src+', sizingMethod=scale)' : '',
            width = width,
            src = '".get_template_directory_uri()."/images/px.gif');
    }
        </style><![endif]-->";
}
add_action('wp_head', 'delicate_direct_styles'); // direct styles


function delicate_scripts() {
  wp_enqueue_script("jquery");
	if (is_singular() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	
	wp_register_script('cycle', get_template_directory_uri().'/js/jquery.cycle.all.min.js', array('jquery'), NULL);
	wp_register_script('superfish', get_stylesheet_directory_uri() . '/js/superfish.js', array('jquery'), '2.9.2');
	wp_register_script('cufon', get_stylesheet_directory_uri() . '/js/cufon.js', array('jquery'), '1.09i');
	wp_register_script('Vegur_400', get_stylesheet_directory_uri() . '/js/Vegur_400.font.js', array('cufon'), NULL);
	
	wp_enqueue_script('superfish');
	wp_enqueue_script('cycle');	
	
	$t_cufon_replace = nattywp_get_option('t_cufon_replace');
	if ($t_cufon_replace == 'yes' || $t_cufon_replace == 'no') {
    wp_enqueue_script('cufon');
    wp_enqueue_script('Vegur_400');
	}
}
add_action('wp_enqueue_scripts', 'delicate_scripts'); // scripts


function delicate_direct_scripts() {
  echo '<!--[if IE 6]><script type="text/javascript" src="'.get_template_directory_uri().'/js/menu.js"></script><![endif]-->';
}
add_action('wp_head', 'delicate_direct_scripts'); // direct scripts


function delicate_footer() {
  $t_tracking = nattywp_get_option( "t_tracking" );
  if($t_tracking == 'no'){}
  else {
    if ($t_tracking != "")
      echo stripslashes(stripslashes($t_tracking));
  }
  // Cufon
  $t_cufon_replace = nattywp_get_option('t_cufon_replace');
  if ($t_cufon_replace == 'yes' || $t_cufon_replace == 'no') {
    echo '<!--[if gte IE 9]><script type="text/javascript">/*<![CDATA[*/Cufon.set(\'engine\', \'canvas\'); /*]]>*/</script><![endif]--><script type="text/javascript">/*<![CDATA[*/Cufon.replace(\'.singlepost .post .title h2, .singlepage .post .title h2, .post .title h2 a\', {hover:true}); Cufon.now();/*]]>*/</script>';
  }
  
  // Slideshow
  if (nattywp_get_option('t_show_slideshow') == 'pag' || !isset($t_show_slideshow) || $t_show_slideshow == 'no') {
    $t_timeout = nattywp_get_option('t_timeout');  
    $t_slide_speed = nattywp_get_option('t_slide_speed'); 
    $t_slide_effect = nattywp_get_option('t_slide_effect');
    if(!isset($t_slide_effect) || $t_slide_effect == 'no') {$t_slide_effect = 'fade';}
    if(!isset($t_timeout) || $t_timeout == 'no') {$t_timeout = '5000';}
    if(!isset($t_slide_speed) || $t_slide_speed == 'no') {$t_slide_speed = '1000';}
    echo '<script type="text/javascript" charset="utf-8">/*<![CDATA[*/ 
    jQuery(document).ready(function() {
        jQuery(".slideshow").cycle({
          fx: "'.$t_slide_effect.'",
          timeout: '.$t_timeout.',
          pager: "#slideshow-nav",
          speed: '.$t_slide_speed.',
          pagerEvent: "click",
          pauseOnPagerHover: true,
          cleartypeNoBg: true });						
      });
      /*]]>*/</script>';
  }
}
add_action('wp_footer', 'delicate_footer');

	
if ( !function_exists('delicate_header_style'))	:
  function delicate_header_style() { ?>
	<style type="text/css">
     <?php if ( 'blank' == get_header_textcolor() ) : ?>
      .head-img .tagline {display:none;}
    <?php else : ?>
      .head-img .tagline {color: #<?php echo get_header_textcolor(); ?> !important;}
    <?php endif; ?>
    .content-pad,
    .slideshow-bg .slideshow, .slideshow-bg .slideshow > div,
    .head-img img {width:<?php echo DELICATE_HEADER_WIDTH; ?>px;}
	</style>
	<?php
}
endif; // delicate_header_style	

if ( !function_exists( 'delicate_admin_header_style')) :
  function delicate_admin_header_style() { ?>
	<style type="text/css">
    .appearance_page_custom-header #headimg {border: none; width:<?php echo DELICATE_HEADER_WIDTH; ?>px;}
    #headimg {position:relative; background:#f7f7f7;}
    #desc {font-size:12px; font-weight:bold; padding:6px 17px 4px 12px; position:absolute; top:50%; right:0px; background:#fff; text-transform:uppercase; <?php if ( get_header_textcolor() != HEADER_TEXTCOLOR ) echo 'color: #'. get_header_textcolor().';'; ?>}
    #headimg img {max-width:<?php echo DELICATE_HEADER_WIDTH; ?>px; height: auto; width: 100%;}
	</style>
<?php
}
endif; // delicate_admin_header_style

if ( !function_exists('delicate_admin_header_image')) :
  function delicate_admin_header_image() { ?>
    <div id="headimg">
      <div id="desc"><?php bloginfo( 'description' ); ?></div>
      <?php $header_image = get_header_image();
      if ( ! empty( $header_image ) ) : ?>
        <img src="<?php echo esc_url( $header_image ); ?>" alt="Header" />
      <?php endif; ?>
    </div>
  <?php }
endif; // delicate_admin_header_image

if (is_admin() && isset($_GET['page'] )) {
    if ($_GET['page'] == 'custom-header' && (nattywp_get_option("t_show_slideshow") != 'yes')) 
    echo '<div id="message4" class="updated" style="border:1px solid #c43;">'. __('<p><strong>Note:</strong> The Custom Header is currently disabled. You should get back to Theme Options and configure Header Area Settings. To do this, open <a href="?page=nattywp_home">Theme Options</a> select <strong>Front Page Settings</strong> tab and choose <strong>Display Header Image</strong> value from drop down list.</p>.', 'delicate').'</div>';
}
// END Custom Header
 
	
function delicate_seo_title($orig_title) {
   if(is_single() || is_page()) {
     global $post;
     $custom_title = get_post_meta($post->ID, 'natty_title', true);
     
     if (strlen($custom_title)) {
        return strip_tags(stripslashes($custom_title)).' | ';      
     } else {
        return $orig_title;
     }
   }
}
add_filter('wp_title', 'delicate_seo_title');


function delicate_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'delicate_page_menu_args' );


function delicate_continue_reading_link() {
	return '<br/><a href="'. get_permalink() . '">' . __( 'Read more <span class="meta-nav">&rarr;</span>', 'delicate' ) . '</a>';
}
function delicate_auto_excerpt_more( $more ) {
	return ' &hellip;' . delicate_continue_reading_link();
}
function delicate_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= delicate_continue_reading_link();
	}
	return $output;
}
add_filter( 'excerpt_more', 'delicate_auto_excerpt_more' );
add_filter( 'get_the_excerpt', 'delicate_custom_excerpt_more' );


function delicate_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'delicate_remove_gallery_css' );


function delicate_show_navigation($args, $func) {
  wp_nav_menu( array( 'container' => '', 'menu_class' => 'topnav fl fr sf-js-enabled sf-shadow', 'menu_id' => 'nav-ie', 'theme_location' => $args, 'link_before' => '<span>', 'link_after' => '</span>', 'fallback_cb' => $func ) );
}


function delicate_get_profile() {
	printf( __( '%1$s', 'delicate' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'delicate' ), get_the_author() ),
			get_the_author()
		)
	);
}

function delicate_show_pagemenu () {
	$pages = wp_list_pages('sort_column=menu_order&title_li=&echo=0&depth=0');
	$pages = preg_replace('%<a ([^>]+)>%U','<a $1><span>', $pages);
	$pages = str_replace('</a>','</span></a>', $pages);
	echo '<ul id="nav-ie" class="topnav fl fr sf-js-enabled sf-shadow">'.$pages.'</ul>';
}
?>