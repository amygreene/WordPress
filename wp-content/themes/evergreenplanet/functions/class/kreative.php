<?php

require_once ('configurator.php');

class Kreative {
	
	var $db = NULL;
	var $name = '';
	var $db_pre = NULL;
	var $config = NULL;
	var $style = '';
	
	function Kreative()
	{
		global $wpdb, $table_prefix;
		
		$this->db = $wpdb;
		$this->db_pre = $table_prefix;
		$this->config = new Configurator();
		
		$this->name = $this->config->item('themename');
		
		if (isset($_GET['kreativestyle']))
		{
			$set = $_GET['kreativestyle'];
			setcookie ("kreative_".strtolower($this->name), $set, time()+31536000);
			$this->style = $set;
		}
		
		$this->load_option();
	}
	
	function load_option()
	{
		$options = array (
			'general' => get_option('kreativetheme_general'),
			'nav' => get_option('kreativetheme_nav'),
			'layout' => get_option('kreativetheme_layout'),
			'ads' => get_option('kreativetheme_ads'),
			'optimize' => get_option('kreativetheme_optimize'),
			'plugs' => get_option('kreativetheme_plugs')
		);
		$defaults = array();
		
		foreach ($options as $opt => $val) 
		{
			if ( $val === FALSE)
			{
				$options[$opt] = $defaults;
			}
			else 
			{
				$options[$opt] = unserialize($val);
			}
			
			$this->config->set($opt, $options[$opt]);
		}
	}
	
	function siteNavigation($depth = 1)
	{
		$kt =& get_instance();
		
		$output = '';
		if (strtolower($kt->config->item('home_link', 'nav')) === 'true') 
		{
			$output .= '<li class="';
			if ( !! is_home()) 
			{
				$output .= 'current_page_item';
			}
			$output .= ' page_item"><a href="' . get_option('home') . '/" title="' . htmlentities($kt->config->item('home_link_desc', 'nav')) . '"><span>' . $kt->config->item('home_link_text', 'nav') . '</span></a></li>';
		}
		
		$output .= wp_list_pages(array(
			'echo' => 0, 
			'title_li' => '', 
			'depth' => $depth,
			'link_before' => '<span>',
			'link_after' => '</span>'
		));
		echo $output;
	}
	
	function siteStyle()
	{
		$kt =& get_instance();
		$alt = $kt->config->item('alt_stylesheet', 'general');
		
		$available = $kt->config->item('stylesheet', 'defaults');
		$default = $kt->config->item('default_stylesheet', 'defaults');
		
		if (trim($kt->style) !== '')
		{
			$alt = $kt->style;
		}
		elseif (isset($_COOKIE["kreative_".strtolower($kt->name)]))
		{
			$alt = $_COOKIE["kreative_".strtolower($kt->name)];
		}
		
		
		
		echo '<link rel="stylesheet" href="';
		echo bloginfo('template_url');
		
		if (array_key_exists($alt, $available) && $alt !== $default)
		{
			echo '/style/style-' . strtolower($available[$alt]) . '.css';
		}
		else 
		{
			echo '/style/style-default.css';
		}
		
		echo '" type="text/css" media="screen" />';
		
	}
	
	function htmlTitle()
	{
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		wp_title('&laquo;', true, 'right');
		
		if ($paged > 1)
		{
			echo ' Page ' . $paged . ' &mdash;'; 
		}
		echo ' ';
		bloginfo('name');
		
		
		if (is_home() && $paged === 1)
		{
			echo ' &mdash; ';
			bloginfo('description');
		}
	}
	
	function siteTitle()
	{
		$kt =& get_instance();
		$logo = $kt->config->item('site_logo', 'general');
		
		echo '<h1 id="blogtitle"><a href="' . get_option('home') . '/">';
		
		if (trim($logo) === '')
		{
			echo get_bloginfo('name');
		}
		else {
			echo '<img src="' . $logo . '" alt="' . get_bloginfo('name') . '" />';
		}
		
		echo '</a></h1>';
		
		if (trim($logo) === '')
		{
			echo '<p class="blogdesc">' . get_bloginfo('description') . '</p>';
		}
		
	}
}

global $KreativeTheme;
$KreativeTheme = new Kreative();

function &get_instance()
{
	global $KreativeTheme;
	
	return $KreativeTheme;
}

function kreative_get_settings($group = 'defaults', $setting, $standard = FALSE) 
{
	$kt =& get_instance();
	$item = $kt->config->item($setting, $group);
	if ( ! $item) $item = $standard; 
	
	return $item;
}

function kreative_show_ads($format = '468x60', $select = '1')
{
	$kt =& get_instance();
	
	$default = array (
		'300x120' => 'ads.gif'
	);
	
	
	if ('true' == $kt->config->item("{$format}_enable_{$select}", 'ads'))
	{
		$code = $kt->config->item("{$format}_html_{$select}", 'ads');
		if (trim($code) !== '')
		{
			echo $code;
		}
		else
		{
			$output = '';
			$img = $kt->config->item("{$format}_img_{$select}", 'ads');
			$url = $kt->config->item("{$format}_url_{$select}", 'ads');
			
			if (trim($img) !== '')
			{
				$output = '<img class="fright" src="'. $img .'" alt="image" />';
			}
			else 
			{
				$output = '<img class="fright" src="'. get_bloginfo('template_url') . '/style/images/'. $default[$format] .'" alt="image" />';
			}
		
			
			if (trim($url) !== '')
			{
				$output = '<a href="' . $url . '">' .$output .'</a>';
			}
			
			echo $output;
		}
		
	}
}
