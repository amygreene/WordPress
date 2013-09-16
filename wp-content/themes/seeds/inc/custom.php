<?php
// *******************************************************************************
//
// Custom functions
// Add all custom functions here
//
// *******************************************************************************

// More by author. Add custom more by author links in sidebar on single post pages.

function get_category_id($cat_name){
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

function my_get_display_author_posts() {
    global $authordata, $post;

    $authors_posts = get_posts( array( 'author' => $authordata->ID, 'showposts' => '3', 'post__not_in' => array( $post->ID ) ) );
    if ( count ($authors_posts) > 0 ) {
        $output = '<h3>More by Author</h3>';
    }

    $output .= '<ul class="latest-single">';
    foreach ( $authors_posts as $authors_post ) {
        if ( has_post_thumbnail( $authors_post->ID ) ) {
          $authors_thumb = get_the_post_thumbnail( $authors_post->ID, 'latest-thumb' );
          } else {
          $authors_thumb = '<img src="' . get_template_directory_uri() . '/img/seeds_logo_placeholder.png" />';
          }
        $output .= '<li>';
        // $output .= '<a href="' . get_permalink( $authors_post->ID ) . '">' . get_the_post_thumbnail( $authors_post->ID, 'medium' ) . '</a>';
        $output .= '<a href="' . get_permalink( $authors_post->ID ) . '">' . $authors_thumb . '</a>';
        $output .= '<div class="latest-overlay">';
        $output .= '<span><a href="' . get_permalink( $authors_post->ID ) . '">' . apply_filters( 'the_title', $authors_post->post_title, $authors_post->ID ) . '</a></span>';
        $output .= '</div>';
        $output .= '</li>';
    }
    $output .= '</ul>';

    return $output;
}

// Custom button classes for comment links

add_filter('comment_reply_link', "my_comment_reply_link");
function my_comment_reply_link ($link = null) {
    return is_user_logged_in()
        ? $link
        : str_replace('comment-reply-link', 'comment-reply-link btn btn-inverse .btn-mini', $link);
}

// Custom help text widget on dashboard

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Editing Seeds and Circuits', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<ul>';
echo '<li>Image Size: 770px wide by 385px tall</li>';
echo '<li>Do not forget to enter custom subtitles where appropriate</li>';
echo '<li>If a title is too long, you can set an optional short title</li>';
echo '</ul>';
}

// Custom meta boxes for subtitles and short titles
// Adapted from Christopher Davis' Meta Box Example at wp.tutsplus.com

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'Optional Title Info', 'cd_meta_box_cb', 'post', 'normal', 'high' );
}

function cd_meta_box_cb( $post )
{
    $values = get_post_custom( $post->ID );
    $my_subtitle = isset( $values['my_subtitle'] ) ? esc_attr( $values['my_subtitle'][0] ) : '';
    $my_shorttitle = isset( $values['my_shorttitle'] ) ? esc_attr( $values['my_shorttitle'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="my_subtitle">Optional Post Subheading</label>
        <input type="text" name="my_subtitle" size="60" id="my_subtitle" value="<?php echo $my_subtitle; ?>" />
    </p>
    
    <p>
        <label for="my_shorttitle">Optional Shortened Post Title</label>
        <input type="text" name="my_shorttitle" size="30" id="my_shorttitle" value="<?php echo $my_shorttitle; ?>" />
    </p>
    <?php   
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
    
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );
    
    // Probably a good idea to make sure your data is set
    if( isset( $_POST['my_subtitle'] ) )
        update_post_meta( $post_id, 'my_subtitle', wp_kses( $_POST['my_subtitle'], $allowed ) );

    if( isset( $_POST['my_shorttitle'] ) )
        update_post_meta( $post_id, 'my_shorttitle', wp_kses( $_POST['my_shorttitle'], $allowed ) );
        
    
}
?>