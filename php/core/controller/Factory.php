<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Factory extends Singleton {
	
	
	private $controllers; # object container
	private $loaded_controllers = array();
	private $loaded_packages = array();
	
	
	
	protected function __construct() {
		
	}
	
	public function __destruct() {
		
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
    final public function import($package) {
    	
    	# resolve package alias
    	if($this->is_alias($package)) {
    		$package = $this->resolve_alias($package);
    	}
    	    	
		# determine if location has already been imported
		if ($this->package_loaded($package)) {
			throw(new Exception("Package '$package' already imported"));
		}
		
		# load package
		$this->load_package($package);
		
		return true;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function instance($package) {
		# resolve package alias
    	if($this->is_alias($package)) {
    		$package = $this->resolve_alias($package);
    	}
		
		# check if package is already loaded
		if ($this->controller_loaded($package)) {
			array_push($this->loaded_controllers, $package);
			return $this->controllers[$package];
		}
		
		# create a new instance of the class
		else {
			$this->import($package);
			
			# get the classname and create a new instance
			$classname = $this->package_classname($package);
			$this->controllers[$package] = new $classname();
			
			array_push($this->loaded_controllers, $package);
			return $this->controllers[$name];
		}
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function load_package($package) {
		
		$path = $this->package_path($package);
		
		# determine if file location exists
		# TODO break into $this->valid_package()
		if (!file_exists($path)) {
			throw(new Exception("Could not import package '$package'. File does not exist."));
		}
		
		# import the file
		require_once $path;
		
		# add location to array
		array_push($this->loaded_packages, $package);
		
		return true;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function package_loaded($package) {
		if (!in_array($package, $this->loaded_packages)) {
			return false;
		}
		
		return true;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function controller_loaded($controller) {
		if (!in_array($controller, $this->loaded_controllers)) {
			return false;
		}
		
		return true;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function package_classname($package) {
		# split package into array by ., return last value in array
		$path = preg_split('/./', $package);
		return end($path);
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function package_path($package) {
		# save original package string
		$path = $package;
		
		# resolve location
		$path = str_replace('.', DIRECTORY_SEPARATOR, $path);
		$path = PATH_FRAMEWORK . $path . EXT;
		# TODO check realpath
		//$path = realpath($path) or die('died');
		
		return $path;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function is_alias($alias) {
		# the first character in an alias is a colon
		if(substr($alias, 0, 1) !== ':') {
			return false;
		}
		return true;
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function resolve_alias($alias) {
		
		# check the validity of the alias
		# TODO $aliases = $this->instance('config.ControllerAliases')->aliases;
		$this->import('config.AppConfig');
		$config = new AppConfig();
		
		# if the alias array is not defined
		if(!$config->package_aliases) {
			throw new Exception("Could not resolve invalid alias '$alias'. Package alias configuration missing.");
		}
		
		# if the alias is not defined
		if(!array_key_exists($alias, $config->package_aliases)) {
			throw new Exception("Could not resolve invalid alias '$alias'");
		}
		
		return $config->package_aliases[$alias];
	}
}


	