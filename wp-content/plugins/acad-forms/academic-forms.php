<?php
/*
Plugin Name: Academic Forms
Description: Connects Academic Formidable Forms to offering data in presence.evergreen.edu
Version: 0.1.1
License: GPL
Author: Amy Greene
Author URI: http://blogs.evergreen.edy/amygreene
*/

// Set the default values for fields: offering_id, offering_code, offering_title, link_id
// field id #s are stored in arrays and corresponds to the field we want to set for the default

//set offering_id
add_filter('frm_get_default_value', 'set_offering_id', 10, 2);
function set_offering_id($offering_id, $field){
    $options = get_option('acadforms');
    $offering_id_array = explode(",",$options['offid']); //convert options string to array
    //set value for each offering_id field
  if(in_array($field->id, $offering_id_array)){ //search the array
   // get sanitized param value from url
   $offering_id = filter_input(INPUT_GET, 'offering_id', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  return $offering_id;
}

//repeat above function for each default value that needs to be set
//set offeringcode
add_filter('frm_get_default_value', 'set_offeringcode', 10, 2);
function set_offeringcode($offeringcode, $field){
    $options = get_option('acadforms');
    $offeringcode_array = explode(",",$options['offcode']); //convert options string to array

    if(in_array($field->id, $offeringcode_array)){
        $offeringcode = filter_input(INPUT_GET, 'offeringcodes', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  return $offeringcode;
}

//set link_id
add_filter('frm_get_default_value', 'set_link_id', 10, 2);
function set_link_id($link_id, $field){
    $options = get_option('acadforms');
    $link_id_array = explode(",",$options['linkid']); //convert options string to array
    if(in_array($field->id, $link_id_array)){
        $link_id = filter_input(INPUT_GET, 'link_id', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return $link_id;
}

//set title
add_filter('frm_get_default_value', 'set_offering_title', 10, 2);
function set_offering_title($offering_title, $field){
    $options = get_option('acadforms');
    $offering_title_array = explode(",",$options['offtitle']); //convert options string to array
    if(in_array($field->id, $offering_title_array)){
        $offering_title = filter_input(INPUT_GET, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    }
    return $offering_title;
}

//adding new admin menu and options for plugin
add_action( 'admin_menu', 'acad_forms_menu' );
add_action('admin_init', 'acad_forms_options_init' );

function acad_forms_options_init(){
    register_setting( 'acad_forms_options', 'acadforms' ); //register new set of options named 'acad_forms_options', store in db entry 'acadforms'
}
function acad_forms_menu() {
    add_options_page( 'Academic Forms Plugin Options', 'Academic Forms', 'manage_options', 'acad-forms', 'acad_forms_plugin_options' );
}
function acad_forms_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    ?>
   <div class="wrap">
   <h2>Academic Forms Options</h2>
       <p>Add the field id#s across all forms on this site for fields that are to be set with default values from presence</p>
       <form method="post" action="options.php">
           <?php settings_fields('acad_forms_options'); ?>
           <?php $options = get_option('acadforms'); ?>
           <table class="form-table">
               <tr valign="top"><th scope="row">Offering ID</th>
                   <td><input type="text" name="acadforms[offid]" value="<?php echo $options['offid']; ?>" /></td>
               </tr>
               <tr valign="top"><th scope="row">Offering Code</th>
                   <td><input type="text" name="acadforms[offcode]" value="<?php echo $options['offcode']; ?>" /></td>
               </tr>
               <tr valign="top"><th scope="row">Link ID</th>
                   <td><input type="text" name="acadforms[linkid]" value="<?php echo $options['linkid']; ?>" /></td>
               </tr>
               <tr valign="top"><th scope="row">Offering Title</th>
                   <td><input type="text" name="acadforms[offtitle]" value="<?php echo $options['offtitle']; ?>" /></td>
               </tr>
           </table>
           <p class="submit">
               <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
           </p>
       </form>

   </div>
<?php
}