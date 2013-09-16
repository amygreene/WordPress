<?php 

function kreative_excerpt($num) 
{  
	$limit = $num+1;  
	$excerpt = explode(' ', get_the_excerpt(), $limit);  
	array_pop($excerpt);  
	
	$excerpt = implode(" ", $excerpt) . "...";  
	
	echo $excerpt;  
}

function kreative_author_avatar($post_author, $size = 40)
{
	if (function_exists('get_avatar'))
	{
		echo get_avatar($post_author, "{$size}");
	}
}

if ( ! function_exists('kreative_recent_comment')) 
{
	function kreative_recent_comment()
	{ 
		global $wpdb, $table_prefix;
		
		$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url, SUBSTRING(comment_content,1,50) AS com_excerpt 
		FROM {$table_prefix}comments 
		LEFT OUTER JOIN {$table_prefix}posts ON ({$table_prefix}comments.comment_post_ID = {$table_prefix}posts.ID) 
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		ORDER BY comment_date_gmt DESC LIMIT 5";
		
		$comments = $wpdb->get_results($sql);
		
		
		foreach ($comments as $comment) 
		{
			$comment_id = get_comment($comment->comment_ID, ARRAY_A);
			$email = $comment_id['comment_author_email'];
			
			$output .= '<div class="kreative_recent_comment_list">';
			$output .= '<div class="align-l xs-pad-lr">' . get_avatar($email, 32) . '</div>';
			
			$output .= '<div class="kreative_recent_comment_text">';
			$output .= "<a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"on '".$comment->post_title . "'\"><strong>". $comment->post_title . '</strong></a>';
			$output .= "<p>" . strip_tags($comment->com_excerpt) . "...</p>";
			$output .= "<p><em>" . strip_tags($comment->comment_author) . "</em></p>";
			
			$output .= "</div>";
			$output .= '<br class="clear" />';
			
			$output .= "</div>";
		}
		
		return $output;
	}
}

function get_ancestor_ids ($child = 0, $inclusive = TRUE, $topdown = TRUE)
{
	if ($child && $inclusive) $ancestors[] = $child;
	
	while ($parent = get_parent_id ( $child ) ) 
	{
		$ancestors[] = $parent;
		$child = $parent;
	}
	
	if ($ancestors && $topdown) krsort($ancestors);
	if ( ! $ancestors) $ancestors[] = 0;
	
	return $ancestors;
}

function kreative_breadcrumb ($show_this = TRUE) {
	global $post; 
	?>
	<a href="<?php bloginfo('url'); ?>/">Home</a> 
	<?php chr(10);
	$ancestors = get_ancestor_ids($post->ID, false);
	$num_ancestors = count($ancestors);
	foreach ($ancestors as $i => $ancestor_id) 
	{
		if ($ancestor_id > 0) 
		{
			echo ' &raquo; <a href="'.get_permalink($ancestor_id).'">'.get_the_title($ancestor_id).'</a>';
		}
	}
	if ($show_this) 
	{
		echo ' &raquo; <a href="'; the_permalink(); echo '">'; the_title(); echo '</a>' . chr(10);
	} 
}

function get_parent_id($child = 0) 
{
	global $wpdb, $table_prefix;
	
	$result = 0;
	
	if ($child > 0) $result = $wpdb->get_var("SELECT post_parent FROM {$table_prefix}posts WHERE ID = $child");
	
	return $result;
}

if ( ! function_exists('kreative_comment')) 
{
	function kreative_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	     <div id="div-comment-<?php comment_ID(); ?>" class="comment-box">
	     	<div class="align-l">
	     		<?php echo get_avatar($comment, $size='40', $default = '' ); ?>
			</div>
			<!--Gravatar-->
			
			<div class="comment-text">
				<p class="author_name">
					<?php printf(__('<strong class="fn">%s</strong>'), get_comment_author_link()) ?>
				</p>
						
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>
			
				<?php comment_text() ?>
				
				<div class="meta">
					<?php printf(__('%1$s'), get_comment_date()) ?>
					<?php edit_comment_link(__('Edit'),' &middot; '); ?>
					&middot; <?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			
			</div><!-- float right -->
			
	    </div><!-- #div-comment -->
	    
		<br class="clear" />
		
		
		<!-- do not close li -->
	<?php 
	}
}

if ( ! function_exists('kreative_pings'))
{
	function kreative_pings($comment, $args, $depth) {
	       $GLOBALS['comment'] = $comment;
	?>
		<li id="comment-<?php comment_ID(); ?>">
			<div class="comment-box pingback">
				<strong>
					<?php comment_author_link(); ?>
				</strong>
				
				<?php comment_text() ?>
			</div>
	<?php
	}
}

function kreative_list_cat($str = '&title_li=<span>Browse Category</span>') {
?>
	<div id="widget-cat-list">
		<ul>
			<?php wp_list_categories($str); ?>
		</ul>
	</div>
<?php
}
?>