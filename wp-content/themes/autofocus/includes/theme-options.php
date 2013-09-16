<?php

////////////////////////////////////////////////////////////////////////////////
//  THEME OPTIONS
////////////////////////////////////////////////////////////////////////////////
$themename = 'AutoFocus';
$shortname = 'tn';
$shortprefix = '_focus_';


$options = array (

   //font setting

    array(	"name" => __("Choose your global body font:"),
			"id" => $shortname . $shortprefix . "body_font",
            "box" => "1",
            "type" => "select",
			"std" => "Georgia, serif",
			"options" => array(
            "Georgia, serif",
            "Arial, sans-serif",
            "Lucida Grande, Lucida Sans, sans-serif",
            "Verdana, sans-serif",
            "Trebuchet MS, sans-serif",
            "Fertigo, serif",
            "Times New Roman, Times, Georgia, serif",
            "Cambria, Georgia, serif",
            "Tahoma, sans-serif",
            "Helvetica, Arial, sans-serif",
            "Corpid, Corpid Bold, sans-serif",
            "Century Gothic, Century, sans-serif",
            "Palatino Linotype, Times New Roman, serif",
            "Garamond, Georgia, serif",
            "Caslon Book BE, Caslon, Arial Narrow",
            "Arial Rounded Bold, Arial",
            "Arial Narrow, Arial",
            "Myriad Pro, Calibri, sans-serif",
            "Candara, Calibri, Lucida Grande",
            "Univers LT 55, Univers LT Std 55, Univers, sans-serif",
            "Ronda, Ronda Light, Century Gothic",
            "Century, Times New Roman, serif",
            "Courier New, Courier, monospace",
            "Walbaum LT Roman, Walbaum, Times New Roman",
            "Dax, Dax-Regular, Dax-Bold, Trebuchet MS",
            "VAG Round, Arial Rounded Bold, sans-serif",
            "Humana Sans ITC, Humana Sans Md ITC, Lucida Grande",
            "Qlassik Medium, Qlassik Bold, Lucida Grande",
            "TradeGothic LT, Lucida Sans, Lucida Grande",
            "Cocon, Cocon-Light, sans-serif",
            "Frutiger, Frutiger LT Std 55 Roman, tahoma",
            "Futura LT Book, Century Gothic, sans-serif",
            "Steinem, Cocon, Cambria",
            "Delicious, Trebuchet MS, sans-serif",
            "Helvetica 65 Medium, Helvetica Neue, Helvetica Bold, sans-serif",
            "Helvetica Neue, Helvetica, Helvetica-Normal, sans-serif",
            "Helvetica Rounded, Arial Rounded Bold, VAGRounded BT, sans-serif",
            "Decker, sans-serif",
            "Mrs Eaves OT, Georgia, Cambria, serif",
            "Anivers, Lucida Sans, Lucida Grande",
            "Geneva, sans-serif",
            "Trajan, Trajan Pro, serif",
            "FagoCo, Calibri, Lucida Grande",
            "Meta, Meta Bold , Meta Medium, sans-serif",
            "Chocolate, Segoe UI, Seips",
            "Ronda, Ronda Light, Century Gothic",
            "DIN, DINPro-Regular, DINPro-Medium, sans-serif",
            "Gotham, Georgia, serif"
            )
            ),

	array(	"name" => __("Choose your global headline font:"),
			"id" => $shortname . $shortprefix . "headline_font",
            "box" => "1",
            "type" => "select",
            "inblock" => "font",
            "std" => "Georgia, serif",
			"options" => array(
            "Georgia, serif",
            "Times New Roman, Times, Georgia, serif",
            "Lucida Grande, Lucida Sans, sans-serif",
            "Arial, sans-serif",
            "Verdana, sans-serif",
            "Trebuchet MS, sans-serif",
            "Fertigo, serif",
            "Georgia, serif",
            "Cambria, Georgia, serif",
            "Tahoma, sans-serif",
            "Helvetica, Arial, sans-serif",
            "Corpid, Corpid Bold, sans-serif",
            "Century Gothic, Century, sans-serif",
            "Palatino Linotype, Times New Roman, serif",
            "Garamond, Georgia, serif",
            "Caslon Book BE, Caslon, Arial Narrow",
            "Arial Rounded Bold, Arial",
            "Arial Narrow, Arial",
            "Myriad Pro, Calibri, sans-serif",
            "Candara, Calibri, Lucida Grande",
            "Univers LT 55, Univers LT Std 55, Univers, sans-serif",
            "Ronda, Ronda Light, Century Gothic",
            "Century, Times New Roman, serif",
            "Courier New, Courier, monospace",
            "Walbaum LT Roman, Walbaum, Times New Roman",
            "Dax, Dax-Regular, Dax-Bold, Trebuchet MS",
            "VAG Round, Arial Rounded Bold, sans-serif",
            "Humana Sans ITC, Humana Sans Md ITC, Lucida Grande",
            "Qlassik Medium, Qlassik Bold, Lucida Grande",
            "TradeGothic LT, Lucida Sans, Lucida Grande",
            "Cocon, Cocon-Light, sans-serif",
            "Frutiger, Frutiger LT Std 55 Roman, tahoma",
            "Futura LT Book, Century Gothic, sans-serif",
            "Steinem, Cocon, Cambria",
            "Delicious, Trebuchet MS, sans-serif",
            "Helvetica 65 Medium, Helvetica Neue, Helvetica Bold, sans-serif",
            "Helvetica Neue, Helvetica, Helvetica-Normal, sans-serif",
            "Helvetica Rounded, Arial Rounded Bold, VAGRounded BT, sans-serif",
            "Decker, sans-serif",
            "Mrs Eaves OT, Georgia, Cambria, serif",
            "Anivers, Lucida Sans, Lucida Grande",
            "Geneva, sans-serif",
            "Trajan, Trajan Pro, serif",
            "FagoCo, Calibri, Lucida Grande",
            "Meta, Meta Bold , Meta Medium, sans-serif",
            "Chocolate, Segoe UI, Seips",
            "Ronda, Ronda Light, Century Gothic",
            "DIN, DINPro-Regular, DINPro-Medium, sans-serif",
            "Gotham, Georgia, serif"
            )
            ),


    //css setting

    array (	"name" => __("Choose your <strong>background colour</strong> *this will changed the body background color"),
			"id" => $shortname . $shortprefix . "bg_color",
            "box" => "1",
            "custom" => "colourpicker",
            "std" => "",
			"type" => "text"),

    array (	"name" => __("Choose your <strong>global text</strong> color: *if background is dark, recommend text color will be white"),
			"id" => $shortname . $shortprefix . "text_color",
            "box" => "1",
            "custom" => "colourpicker",
            "std" => "",
			"type" => "text"),

    array (	"name" => __("Choose your <strong>link</strong> colour:"),
			"id" => $shortname . $shortprefix . "link_color",
            "box" => "1",
            "custom" => "colourpicker",
            "std" => "",
			"type" => "text"),

    array (	"name" => __("Choose your <strong>link hover</strong> colour:"),
			"id" => $shortname . $shortprefix . "link_hover_color",
            "box" => "1",
            "custom" => "colourpicker",
            "std" => "",
			"type" => "text"),


    array (	"name" => __("Choose your <strong>comment alt</strong> background color: *only apply if thread comments activated"),
			"id" => $shortname . $shortprefix . "com_alt_color",
            "box" => "1",
            "custom" => "colourpicker",
            "std" => "",
			"type" => "text"),


    array (	"name" => __("Enable or disable description text for featured image"),
			"id" => $shortname . $shortprefix . "feat_description",
            "box" => "1",
            "type" => "select",
			"std" => "enable",
			"options" => array("enable","disable")
            )

);


function focus_theme_admin() {
global $themename, $shortname, $options;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<div id="wrap-admin">
<div id="content-admin">

<div id="top-content-admin">
<h4><?php _e($themename . ' Theme Options'); ?></h4>
</div>


<div class="admin-content">

<form method="post" id="option-mz-form">


<div class="admin-layer">



<div class="option-box">
<h4><?php _e('Themes Settings'); ?></h4>
<div class="option-wrap">

<div class="pwrap">
<p><strong><?php _e('How do the homepage image work:'); ?></strong></p>
<p><em><?php _e('it will automatically find your latest or order by number post attachment gallery image (no hotlink image will be fetch)'); ?></em></p>
</div>

<?php foreach ($options as $value) {
if (($value['type'] == "text") && ($value['box'] == "1") && ($value['custom'] == "colourpicker")) { ?>

<div class="pwrap">
<?php $i == $i++ ; ?>
<p><?php echo $value['name']; ?>:</p>
<p><input class="ops-colour color {pickerPosition:'top',styleElement:'pick <?php echo $i; ?>',required:false,hash:true}" name="<?php echo $value['id']; ?>" id="colorpickerField<?php echo $i; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
<br />
<input class="pick" id="pick <?php echo $i; ?>">
</p></div>

<?php } elseif ( ($value['type'] == "text") && ($value['box'] == "1") ) { ?>

<div class="pwrap">
<p><?php echo $value['name']; ?>:</p>
<p><input name="<?php echo $value['id']; ?>" class="ops-text" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></p>
</div>

<?php } elseif (( $value['type'] == "select") && ($value['box'] == "1") ) { ?>

<div class="pwrap">
<p><?php echo $value['name']; ?>:</p>
<p><select name="<?php echo $value['id']; ?>" class="ops-select" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
</p>
</div>

<?php } elseif (($value['type'] == "textarea") && ($value['box'] == "1")) { ?>

<div class="pwrap">
<p><?php echo $value['name']; ?>:</p>
<?php $valuex = $value['id'];
$valuey = stripslashes($valuex);
$video_code = get_settings($valuey);
?>
<p><textarea class="ops-area" name="<?php echo $valuey; ?>" cols="40%" rows="8" /><?php if ( get_settings($valuey) != "") { echo stripslashes($video_code); } else { echo $value['std']; } ?></textarea>
</p></div>
<?php }
} /* endforeach */ ?>

</div>
</div>

</div>


<p class="submit">
<input name="save" type="submit" class="button-primary" value="<?php echo attribute_escape(__('Save Options')); ?>" />
<input type="hidden" name="action" value="save" />
</p>
</form>

<form method="post">
<p class="submit">
<input name="reset" type="submit" class="button-primary" value="<?php echo attribute_escape(__('Reset Options')); ?>" />
<input type="hidden" name="action" value="reset" /></p>
</form>

</div>
</div>
</div>

<?php }

function focus_add_theme_admin() {
global $themename, $shortname, $options;
if ( $_GET['page'] == "functions.php" ) {
if ( 'save' == $_REQUEST['action'] ) {
foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } }
header("Location: themes.php?page=functions.php&saved=true");
die;
} else if( 'reset' == $_REQUEST['action'] ) {
foreach ($options as $value) {
delete_option( $value['id'] ); }
header("Location: themes.php?page=functions.php&reset=true");
die;
}
}
add_theme_page(_g (__($themename . ' Options')),  _g (__($themename . ' Options')),  'edit_themes', 'functions.php', 'focus_theme_admin');
}

add_action('admin_menu', 'focus_add_theme_admin');

?>