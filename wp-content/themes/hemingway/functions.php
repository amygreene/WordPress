<?php

if(function_exists('automatic_feed_links')) {
automatic_feed_links();
}

if ( function_exists('register_sidebar') ) {

register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><ul class="counts"><li>',
));

register_sidebar(array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><ul class="counts"><li>',
));


register_sidebar(array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</li></ul></div>',
		'before_title' => '<h2>',
		'after_title' => '</h2><ul class="counts"><li>',
));

}







$themecolors = array(
	'bg' => '000000',
	'text' => 'bfbfbf',
	'link' => 'ffffff',
	'border' => '000000'
	);



define('TEMPLATE_DOMAIN','hemingway');
////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
function init_localization( $locale ) {
return "en_EN";
}
// Uncomment add_filter below to test your localization, make sure to enter the right language code.
// add_filter('locale','init_localization');

load_theme_textdomain( TEMPLATE_DOMAIN, TEMPLATEPATH . '/languages/' );

////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 120, 120, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
}



////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_comment
////////////////////////////////////////////////////////////////////////////////

function list_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<cite>
<span class="avatarspan">
<?php if (function_exists('avatar_display_comments')) { ?>
<?php avatar_display_comments(get_comment_author_email(),'32',''); ?>
<?php } else { ?>
<?php if (function_exists('get_avatar')) { echo get_avatar( get_comment_author_email() , 32 ); } ?>
<?php } ?>
</span>
<span class="author"><?php comment_author_link() ?></span>
<span class="date"><?php comment_date('n.j.y') ?> / <?php comment_date('ga') ?> / <?php edit_comment_link('edit',' / ',''); ?>&nbsp;&nbsp;&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
			</cite>
			<div class="content">
				<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e("Your comment is awaiting moderation.",TEMPLATE_DOMAIN); ?></em>
				<?php endif; ?>
				<?php comment_text() ?>
			</div>
			<div class="clear"></div>

<?php

}

////////////////////////////////////////////////////////////////////////////////
// wp 2.7 wp_list_ping
////////////////////////////////////////////////////////////////////////////////

function list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }

add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
global $id;
$comments_by_split = get_comments('post_id=' . $id);
$comments_by_type = &separate_comments($comments_by_split);
return count($comments_by_type['comment']);
}

////////////////////////////////////////////////////////////////////////////////
// CUSTOM IMAGE HEADER
////////////////////////////////////////////////////////////////////////////////

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', ''); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 960); //width is fixed
define('HEADER_IMAGE_HEIGHT', 150);
define('NO_HEADER_TEXT', true );

function hem_admin_header_style() { ?>
<style type="text/css">
#headimg { background: url(<?php header_image() ?>) no-repeat; }
#headimg { height: <?php echo HEADER_IMAGE_HEIGHT; ?>px; width: <?php echo HEADER_IMAGE_WIDTH; ?>px; }
#headimg h1, #headimg #desc { display: none; }
</style>
<?php }

add_custom_image_header('', 'hem_admin_header_style');


















// this varies but the single page content width seems to be 607px max
$content_width = 600;

class Hemingway
	{
		
		var $raw_blocks;
		var $available_blocks;
		var $style;
		var $version;
		
		function add_available_block($block_name, $block_ref)
			{

				$blocks = $this->available_blocks;
				
				if (!$blocks[$block_ref]){
					$blocks[$block_ref] = $block_name;
					update_option('hem_available_blocks', $blocks);
					wp_cache_flush();
				}
				
			}
		
		function get_available_blocks()
			// This function returns an array of available blocks
			// in the format of $arr[block_ref] = block_name
			{				
				$this->available_blocks = get_option('hem_available_blocks');
				return $this->available_blocks;
			}
		
		function get_block_contents($block_place)
			// Returns an array of block_refs in specififed block
			{
				if (!$this->raw_blocks){
					$this->raw_blocks = get_option('hem_blocks');
				}
				return $this->raw_blocks[$block_place];
			}
		
		function add_block_to_place($block_place, $block_ref)
			{
				$block_contents = $this->get_block_contents($block_place);
				if (in_array($block_ref, $block_contents))
					return true;
				
				$block_contents[] = $block_ref;	
				$this->raw_blocks[$block_place] = $block_contents;
				update_option('hem_blocks', $this->raw_blocks);
				wp_cache_flush(); // I was having caching issues
				return true;
			}
			
		function remove_block_in_place($block_place, $block_ref)
			{
				$block_contents = $this->get_block_contents($block_place);
				if (!in_array($block_ref, $block_contents))
					return true;
				$key = array_search($block_ref, $block_contents);
				unset($block_contents[$key]);
				$this->raw_blocks[$block_place] = $block_contents;
				update_option('hem_blocks', $this->raw_blocks);
				wp_cache_flush(); // I was having caching issues
				return true;
			}
			
			// Templating functions
			
			function get_block_output($block_place)
				{
					$blocks = $this->get_block_contents($block_place);
					foreach($blocks as $key => $block ){
						include (TEMPLATEPATH . '/blocks/' . $block . '.php');
					}
				}
				
			function get_style(){
				$this->style = get_option('hem_style');
			}
	}
	
$hemingway = new Hemingway();
$hemingway->get_available_blocks();
$hemingway->get_style();

$hemingway->version = "0.13";
// Options

$default_blocks = Array(
	'recent_entries' => 'Recent Entries',
	'about_page' => 'About Page',
	'category_listing' => 'Category Listing',
	'blogroll' => 'Blogroll',
	'pages' => 'Pages',
	'monthly_archives' => 'Monthly Archives'
);

$default_block_locations = Array(
	'block_1' => Array('about_page'),
	'block_2' => Array('recent_entries'),
	'block_3' => Array('category_listing'),
	'block_4' => Array(),
	'block_5' => Array(),
	'block_6' => Array()
);

if (!get_option('hem_version') || get_option('hem_version') < $hemingway->version){
	// Hemingway isn't installed, so we'll need to add options
	if (!get_option('hem_version') )
		add_option('hem_version', $hemingway->version, 'Hemingway Version installed');
	else
		update_option('hem_version', $hemingway->version);

	if (!get_option('hem_available_blocks') ) 
		add_option('hem_available_blocks', $default_blocks, 'A list of available blocks for Hemingway');
	
	if (!get_option('hem_blocks') ) 
		add_option('hem_blocks', $default_block_locations, 'An array of blocks and their contents');
	
	if (!get_option('hem_style') )
		add_option('hem_style', '', 'Location of custom style sheet');
}
// Ajax Stuff

if ($_GET['hem_action'] == 'add_block'){

	$block_ref = $_GET['block_ref'];
	$block_place = $_GET['block_place'];
	
	$block_name = $hemingway->available_blocks[$block_ref];
	
	$hemingway->add_block_to_place($block_place, $block_ref);

	ob_end_clean(); // Kill preceding output
	$output = '<ul>';
	foreach($hemingway->get_block_contents($block_place) as $key => $block_ref){
			$block_name = $hemingway->available_blocks[$block_ref];
			$output .= '<li>' . $block_name . ' (<a href="#" onclick="remove_block(\'' . $block_place . '\', \'' . $block_ref . '\');">remove</a>)</li>';
	}
	$output .= '</ul>';
	echo $output;
	exit(); // Kill any more output
}

if ($_GET['hem_action'] == 'remove_block'){
	
	$block_ref = $_GET['block_ref'];
	$block_place = $_GET['block_place'];
	
	$hemingway->remove_block_in_place($block_place, $block_ref);

	ob_end_clean(); // Kill preceding output
	$output = '<ul>';
	foreach($hemingway->get_block_contents($block_place) as $key => $block_ref){
			$block_name = $hemingway->available_blocks[$block_ref];
			$output .= '<li>' . $block_name . ' (<a href="#" onclick="remove_block(\'' . $block_place . '\', \'' . $block_ref . '\');">remove</a>)</li>';
	}
	$output .= '</ul>';
	echo $output;
	exit(); // Kill any more output
}

if ($_POST['custom_styles']){
	update_option('hem_style', $_POST['custom_styles']);
	wp_cache_flush();
	$message  = 'Styles updated!';
}

if ($_POST['block_ref']){
	$hemingway->add_available_block($_POST['display_name'], $_POST['block_ref']);
	$hemingway->get_available_blocks();
	$message = 'Block added!';
}

// Stuff

// add_action ('admin_menu', 'hemingway_menu');

$hem_loc = '../themes/' . basename(dirname($file)); 

function hemingway_scripts() {
	$dir = get_bloginfo('template_directory');
	wp_enqueue_script('prototype');
	wp_enqueue_script('dragdrop', $dir . '/admin/js/dragdrop.js', false, 1);
	wp_enqueue_script('effects', $dir . '/admin/js/effects.js', false, 1);
}

function hemingway_menu() {
	$page = add_submenu_page('themes.php', 'Hemingway Options', 'Hemingway Options', 5, $hem_loc . 'functions.php', 'menu');
	add_action('load-' . $page, 'hemingway_scripts');
}

function menu() {
global $hem_loc, $hemingway, $message;
?>
<!--
Okay, so I don't honestly know how legit this is, but I want a more intuitive interface
so I'm going to import scriptaculous. There's a good chance this is going to mess stuff up
for some people :)
-->
<script type="text/javascript">
	function remove_block(block_place, block_ref){
		url = 'themes.php?page=functions.php&hem_action=remove_block&block_place=' + block_place + '&block_ref=' + block_ref;
		new Ajax.Updater(block_place, url,
				{
					evalScripts:true, asynchronous:true
				}
		)
	}
</script>
<style>
	.block{
		width:200px;
		height:200px;
		border:1px solid #CCC;
		float:left;
		margin:20px 1em 20px 0;
		padding:10px;
		display:inline;
	}
	.block ul{
		padding:0;
		margin:0;
	}
	.block ul li{
		margin:0 0 5px 0;
		list-style-type:none;
	}
	.block-active{
		border:1px solid #333;
		background:#F2F8FF;
	}
	
	#addables li{
		list-style-type:none;
		margin:1em 1em 1em 0;
		background:#EAEAEA;
		border:1px solid #DDD;
		padding:3px;
		width:215px;
		float:left;
		cursor:move;
	}
	ul#addables{
		margin:0;
		padding:0;
		width:720px;
		position:relative;
	}
</style>




<?php if($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message?></p></div>
<?php endif; ?>

<div class="wrap" style="position:relative;">
<h2><?php _e('Hemingway Options'); ?></h2>

<h3>Color Options</h3>
<p>Choose a primary color for your site:</p>
<form name="dofollow" action="" method="post">
  <input type="hidden" name="page_options" value="'dofollow_timeout'" />

  <p><label><input name="custom_styles" type="radio" value="none" <?php if ($hemingway->style == 'none') echo 'checked="checked"'; ?> /> 
  Black</label></p>
  <p><label><input name="custom_styles" type="radio" value="white.css" <?php if ($hemingway->style == 'white.css') echo 'checked="checked"'; ?> /> White</label></p>

	<input type="submit" value="Update Color &raquo;" />
</form>

<h3>Hemingway's Bottombar&trade;</h3>
<p>Drag and drop the different blocks into their place below. After you drag the block to the area, it will update with the new contents automatically.</p>

<ul id="addables">
	<?php foreach($hemingway->available_blocks as $ref => $name) : ?>
	<li id="<?php echo  $ref ?>" class="blocks"><?php echo  $name ?></li>
	<script type="text/javascript">new Draggable('<?php echo  $ref ?>', {revert:true})</script>
	<?php endforeach; ?>
</ul>

<div class="clear"></div>

<div class="block" id="block_1">
	<ul>
		<?php 
		foreach($hemingway->get_block_contents('block_1') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_1', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_1', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_1', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_1&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_2">
	<ul>
		<?php 
		foreach($hemingway->get_block_contents('block_2') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_2', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_2', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_2', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_2&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_3">
	<ul>
		<?php 
		foreach($hemingway->get_block_contents('block_3') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_3', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_3', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_3', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_3&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<!-- Maybe later -->


<div class="clear"></div>

<div class="block" id="block_4">
	Block 4
	<ul>
		<?php
		foreach($hemingway->get_block_contents('block_4') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_4', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_4', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_4', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_4&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_5">
	Block 5
	<ul>
		<?php
		foreach($hemingway->get_block_contents('block_5') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_5', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_5', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_5', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_5&block_ref=' + element.id,
				{
					evalScripts:true, asynchronous:true
				}
			)
		},
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_6">
	Block 6
	<ul>
		<?php 
		foreach($hemingway->get_block_contents('block_6') as $key => $block_ref) :
			$block_name = $hemingway->available_blocks[$block_ref];
		?>
			<li><?php echo  $block_name ?> (<a href="#" onclick="remove_block('block_6', '<?php echo $block_ref?>');">remove</a>)</li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_6', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_6', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_6&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="clear"></div>

	<?php
		$blocks_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_template() . '/blocks');
	
		if ($blocks_dir) {
			while(($file = $blocks_dir->read()) !== false) {
					if (!preg_match('|^\.+$|', $file) && preg_match('|\.php$|', $file)) 
					$blocks_files[] = $file;
				}
			}
			if ($blocks_dir || $blocks_files) {
				foreach($blocks_files as $blocks_file) {
				$block_ref = preg_replace('/\.php/', '', $blocks_file);
				if (!array_key_exists($block_ref, $hemingway->available_blocks)){
				?>
				<h3>You have uninstalled blocks!</h3>
				<p>Give the block <strong><?php echo $block_ref ?></strong> a display name (such as "About Page")</p>
				<form action="" name="dofollow" method="post">
					<input type="hidden" name="block_ref" value="<?php echo $block_ref?>" />
					<?php echo $block_ref ?> : <input type="text" name="display_name" />
					<input type="submit" value="Save" />
				</form>
				<?php
				}
			}
		}
		?>




</div>

<?php
}
?>
