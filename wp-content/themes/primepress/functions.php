<?php
define('TEMPLATE_DOMAIN','primepress'); 
////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////

// Uncomment this to test your localization, make sure to enter the right language code.

//function test_localization( $locale ) {
//return "fr_FR";
//}
//add_filter('locale','test_localization');


load_theme_textdomain('primepress', TEMPLATEPATH . '/languages/');


require_once(TEMPLATEPATH . '/library/pp-options.php');

require_once(TEMPLATEPATH . '/library/widgets.php');



add_filter( 'comments_template', 'legacy_comments' );

function legacy_comments( $file ) {

	if ( !function_exists('wp_list_comments') )

		$file = TEMPLATEPATH . '/comments-legacy.php';

	return $file;

}


////////////////////////////////////////////////////////////////////////////////
// CUSTOM IMAGE HEADER
////////////////////////////////////////////////////////////////////////////////

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/headers/PP-field-of-dreams.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 920); //width is fixed
define('HEADER_IMAGE_HEIGHT', 150);
define('NO_HEADER_TEXT', true );

function pp_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

add_custom_image_header('', 'pp_admin_header_style');

?>