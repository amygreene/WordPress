<?php

class Configurator
{
	var $data = array(
		'defaults' => array (
			'themename' => 'EvergreenPlanet',
			'version' => '1.0',
			'stylesheet' => array (
				'0' => 'Default'
			),
			'default_stylesheet' => '0'
		)
	);
	
	function item($key, $group = 'defaults')
	{
		if (array_key_exists($key, $this->data[$group])) :
			if ( is_string($this->data[$group][$key])) :
				return stripslashes($this->data[$group][$key]);
			else :
				return $this->data[$group][$key];
			endif;
		else :
			return FALSE;
		endif;
	}
	function set($group = '', $value = array(), $frag = '')
	{
		if (trim($group) !== '') :
			if (array_key_exists($group, $this->data) && is_array($this->data)) :
				if (trim($frag) !== '' && array_key_exists($frag, $this->data[$group]) && is_array($this->data[$group][$frag])) :
					$this->data[$group][$frag] = array_merge($this->data[$group][$frag], $value);
					
				elseif (trim($frag) !== '') :
					$this->data[$group][$frag] = $value;
					
				else :
					$this->data[$group] = array_merge($this->data[$group], $value);
					
				endif;
				
			else :
				$this->data[$group] = $value;
					
			endif;
			
		endif;
	}
	
	function save($group)
	{
		update_option('kreativetheme_' . $group, serialize($this->data[$group]));
	}
}
