<?php

/*
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

final class Application {
	
	const PATH_FRAMEWORK = '../php/';
	const PATH_CONTROLLERS = '../php/controllers/';
	const PATH_MODELS = '../php/models/';
	const PATH_LANGUAGES = '../php/languages/';
	//const PATH_DOCROOT = __DIR__.DIRECTORY_SEPARATOR;
	const CLASS_EXT = '.php';
	
	
	public function __construct() {
		$this->init();
	}
	
	public function __destruct() {
		
		
	}
	
	
	
	public function init() {
		#TODO init ../wddsocial/Framework.php
	/*
		$framework_path= '../wddsocial/';
		
		(!is_dir($framework_path) and is_dir(DOCROOT.$framework_path)) 
			and $framework_path = DOCROOT.$framework_path;
		
		//echo $framework_path;
		
		define('FRAMEWORK_PATH', realpath($framework_path).DIRECTORY_SEPARATOR);
		
		echo constant('FRAMEWORK_PATH');
	*/
	
	}
	
	
	
	public function import($location) {
		
		# save original path string
		$path = $location;
		
		# resolve location		
		$location = str_replace('.', '/', $location);
		$location = self::PATH_FRAMEWORK . $location . self::CLASS_EXT;
		# determine if file location exists
		
		if (file_exists($location)) {
			require_once $location;
		}
		else {
			throw(new Exception("Could not import path '$path'")); 
		}
	}
	
	
	
	public function requireLogin() {
		
	}
	
	
	
	public function log_error($e) {
		//require_once self::CONTROLLERS_DIR . '/core/Template.php';
		
		//file_put_contents('log.txt', $error, FILE_APPEND);
		echo 'Application caught error: ' . $e->getMessage();;
	}
}