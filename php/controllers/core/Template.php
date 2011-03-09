<?php

/*
* 
* 
* @author Tyler Matthews (tmatthewsdev@gmail.com)
* @author Anthony Colangelo (anthony@acolangelo.com)
*/

class Template {
	
	private $options;
	private $urlArray;
	
	
	public function __construct() {
		$this->init();
		
	}
	
	public function __destruct() {
		
		
	}
	
	
	
	/**
	* 
	* @author Tyler Matthews (tmatthewsdev@gmail.com)
	* @author Anthony Colangelo (anthony@acolangelo.com)
	*/
	
	private function init() {
		# initialize variables
		$this->options = array();
		
		# create an array of the current directory path
		$this->urlArray = explode('/', substr($_SERVER['REQUEST_URI'], 0));
		
		# calculate the relative path of the sites root folder
		$home_dir = '';
		for($i = 0; $i < count($this->urlArray)-1; $i++){
			$home_dir .= '../';
		}
		
		# add home_dir variable to global display options
		$this->set_option('home_dir', $home_dir);		
		
	}
	
	
	
	/**
	* 
	* @author Tyler Matthews (tmatthewsdev@gmail.com)
	*/
	
	public function set_option($name, $value) {
		$this->options[$name] = $value;
	}
	
	
	
	/**
	* 
	* @author Tyler Matthews (tmatthewsdev@gmail.com)
	*/
	
	public function display($content, $options = null) {
		
		# include global options
		if($options or $this->options) {
			if(!$options) $options = array();
			$options = array_merge($this->options, $options);
		}
		
		# load content block
		echo $content . ' - ';
		print_r($options);
		
		# return or display
		
	}
}