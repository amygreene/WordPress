<?php
//register settings
function fresh_theme_settings_init(){
	register_setting( 'fresh_theme_settings', 'fresh_theme_settings' );
}

//menu
function fresh_theme_add_settings_page() {
add_menu_page( __( 'Fresh & Clean Settings' ), __( 'Fresh & Clean Settings' ), 'manage_options', 'fresh-settings', 'fresh_theme_settings_page');
}

add_action( 'admin_init', 'fresh_theme_settings_init' );
add_action( 'admin_menu', 'fresh_theme_add_settings_page' );

//options
$slider_effects = array("random", "fade", "fold", "slideInRight", "slideInLeft", "sliceDown", "sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");

//start settings page
function fresh_theme_settings_page() {
global $slider_effects;
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
?>

<div class="wrap">
<div id="icon-options-general" class="icon32"></div>
<h2><?php _e( 'Fresh & Clean Settings' ) ?></h2>


<?php if ( false !== $_REQUEST['updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
<?php endif; ?>
<form method="post" action="options.php">

<?php settings_fields( 'fresh_theme_settings' ); ?>
<?php $options = get_option( 'fresh_theme_settings' ); ?>

<table class="form-table">  

<tr valign="top">
<th scope="row">Theme Credits</th>
<td><p>The <a href="http://www.wpexplorer.com/fresh-clean-wordpress-theme-by-wpexplorer.html" target="_blank">Fresh &amp; Clean</a> Theme was created by AJ Clarke from <a href="http://www.wpexplorer.com" target="_blank"><strong>WPExplorer.com</strong></a></p>
</td>
</tr>

<tr valign="top">
<th scope="row">Do You like this theme?</th>
<td><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=215260205165212&amp;xfbml=1"></script><fb:like href="http://www.wpexplorer.com/fresh-clean-wordpress-theme-by-wpexplorer.html" send="true" layout="button_count" width="450" height="40" show_faces="false" font=""></fb:like>
<br /><br />
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<g:plusone size="medium" href="http://www.wpexplorer.com/fresh-clean-wordpress-theme-by-wpexplorer.html"></g:plusone>
<br /><br />
<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.wpexplorer.com/fresh-clean-wordpress-theme-by-wpexplorer.html" data-count="horizontal" data-via="WPExplorer">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Favicon' ); ?></th>
<td>
<input id="fresh_theme_settings[favicon]" class="regular-text" type="text" size="36" name="fresh_theme_settings[favicon]" value="<?php esc_attr_e( $options['favicon'] ); ?>" />
<label class="description abouttxtdescription" for="fresh_theme_settings[favicon]"><?php _e( 'Upload or type in the URL for the site favicon.' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Logo' ); ?></th>
<td>
<input id="fresh_theme_settings[logo]" class="regular-text" type="text" size="36" name="fresh_theme_settings[logo]" value="<?php esc_attr_e( $options['logo'] ); ?>" />
<label class="description abouttxtdescription" for="fresh_theme_settings[logo]"><?php _e( 'Upload or type in the URL for the site favicon.' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Transition' ); ?></th>
<td>
<select name="fresh_theme_settings[effect]">
<?php foreach ($slider_effects as $option) { ?>
<option <?php if ($options['effect'] == $option ){ echo 'selected="selected"'; } ?>><?php echo htmlentities($option); ?></option>
<?php } ?>
</select>					
<label class="description" for="fresh_theme_settings[effect]"><?php _e( 'Choose the type of transition you want your slider to have. <small>~ Default is random.</small>' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Animation Speed' ); ?></th>
<td>
<input id="fresh_theme_settings[anim_speed]" class="regular-text" type="text" name="fresh_theme_settings[anim_speed]" value="<?php esc_attr_e( $options['anim_speed'] ); ?>" />
<label class="description" for="fresh_theme_settings[anim_speed]"><?php _e( 'Type in the speed for the slide transitions in milliseconds. <small>~ Default is 500.</small>' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Slider Pause Time' ); ?></th>
<td>
<input id="fresh_theme_settings[pause_time]" class="regular-text" type="text" name="fresh_theme_settings[pause_time]" value="<?php esc_attr_e( $options['pause_time'] ); ?>" />
<label class="description" for="fresh_theme_settings[pause_time]"><?php _e( 'This is the time the image is displayed before it transits to the next, in milliseconds. <small>~ Default is 3000.</small>' ); ?></label>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Header Ad Code' ); ?></th>
<td>
<label class="description abouttxtdescription" for="fresh_theme_settings[header_ad]"><?php _e( 'Insert your code for the header ad ~ 468px by 60 - insert full HTMl or adsense code, not just the image.' ); ?></label>
<br />
<textarea id="fresh_theme_settings[header_ad]" class="regular-text" name="fresh_theme_settings[header_ad]" rows="5" cols="36"><?php esc_attr_e( $options['header_ad'] ); ?></textarea>
</td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Analytics Code' ); ?></th>
<td>
<label class="description" for="fresh_theme_settings[analytics]"><?php _e( 'Enter your analytics tracking code' ); ?></label>
<br />
<textarea id="fresh_theme_settings[analytics]" class="regular-text" name="fresh_theme_settings[analytics]" rows="5" cols="36"><?php esc_attr_e( $options['analytics'] ); ?></textarea>
</td>
</tr>

<tr valign="top">
<th scope="row">Please Donate To Keep My Themes Free. $5, $10, $20, $100...It all helps!</th>
<td>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="G9UTKQLKVTHNL">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></td>
</tr>

<tr valign="top">
<th scope="row">Get More Themes!</th>
<td>
<a href="http://www.wpexplorer.com/themeforest">Get More Themes</a>
</td>
</tr>

</table>
<p class="submit-changes">
<input type="submit" class="button-primary" value="<?php _e( 'Save Options' ); ?>" />
</p>
</form>
</div><!-- END wrap -->

<?php
}
//sanitize and validate
function portafolio_options_validate( $input ) {
	global $select_options, $radio_options;
	if ( ! isset( $input['option1'] ) )
		$input['option1'] = null;
	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
	if ( ! isset( $input['radioinput'] ) )
		$input['radioinput'] = null;
	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
		$input['radioinput'] = null;
	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

?>