<?php

namespace Framework5;

/*
* The Factory class handles package methods and instances 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Factory extends Controller {
	
	private static $_controllers; # object container
	private static $_loadedControllers = array(); # package names of _controllers
	private static $_importedPackages = array(); # package names of all imported packages
	
	/**
	* Imports a package or alias
	* 
	* @package string package
	* @return boolean
	*/
	
	final public static function import($package) {
		
		debug("Factory importing package '$package'");
		
		# resolve package alias
		if(static::_package_is_alias($package)) $package = static::_package_resolve_alias($package);
		
		# determine if location has already been imported
		if (!static::loaded($package)) static::_load_package($package);		
		return true;
	}
	
	
	
	/**
	* Determines if a package has been loaded
	* 
	* @param string package
	*/
	
	final public static function loaded($package) {
		if (!in_array($package, static::$_importedPackages)) {
			return false;
		}
		return true;
	}
	
	
	
	/**
	* Returns a factory instance of a given package or alias
	* 
	* @param string package
	* @return object
	*/
	
	final public static function instance($package) {
		
		# resolve package alias
    	if(static::_package_is_alias($package)) {
    		$package = static::_package_resolve_alias($package);
    	}
		
		# check if package is already loaded
		if (static::instance_loaded($package)) {
			debug("Factory retrieved instance of '$package'");
			return static::$_controllers[$package];
		}
		
		# create a new instance of the class
		else {
			static::import($package);
			
			# get the classname and create a new instance
			$classname = static::package_class($package);
			
			static::$_controllers[$package] = new $classname();
			
			array_push(static::$_loadedControllers, $package);
			
			debug("Factory created instance of '$package'");
			return static::$_controllers[$package];
		}
	}
	
	
	
	/**
	* Returns true is a given package instance exists
	* 
	* @param string package
	* @return bool
	*/
	
	final public static function instance_loaded($package) {
		if (!in_array($package, static::$_loadedControllers)) {
			return false;
		}
		
		return true;
	}
	
	
	
	/**
	* Returns the classname of a given package
	* 
	* @param string package
	* @return string
	*/
	
	final public static function package_class($package) {
		# split package into array by ., return last value in array
		$path = explode('.', $package);
		return end($path);
	}
	
	
	
	/**
	* Gets the base path for a package
	* ex: core.controller.Controller => core.controller
	* 
	*/
	
	final public static function package_base($package) {
		$path = explode('.', $package);
		$count = count($path);
		
		for ($i=0; $i<$count-1; $i++) {
			$base .= $path[$i];
			if ($i !== $count-2) $base .= '.';
		}
		
		return $base;
	}
	
	
	
	/**
	* Checks if the given package is a valid file
	* 
	* @param string package
	* @return boolean
	*/
	
	final public static function package($package) {
		if (!file_exists(static::_package_path($package))) return false;
		return true;
	}
	
	
	
	/**
	* Returns true if the given object implements the given namespace
	* 
	* @param object
	* @param string interface
	* @retun boolean
	*/
	
	final public static function implement($object, $interface) {
		$reflection = new \ReflectionClass($object);
		if(!in_array($interface, $reflection->getInterfaceNames())) {
			return false;
		}
		return true;
	}
	
	
	/**
	* Resolves a package name to an absolute path
	* 
	* @param string package
	* @return string
	*/
	
	final private static function _package_path($package) {
		# save original package string
		$path = $package;
		
		# resolve package alias
		if(static::_package_is_alias($package)) $package = static::_package_resolve_alias($package);
		
		# resolve location
		$path = str_replace('.', DIRECTORY_SEPARATOR, $path);
		$path = PATH_FRAMEWORK . $path . EXT;
		# TODO check realpath
		//$path = realpath($path)
		
		return $path;
	}
	
	
	
	/**
	* Loads a package
	* ex: core.controller.Controller => require /core/controller/Controller.php
	* 
	* @param string package
	* @return boolean
	*/
	
	final private static function _load_package($package) {
		
		# get the path of the package
		$path = static::_package_path($package);
		
		# check valid path
		if (!static::package($package)) {
			$message = "Factory could not load package '$package'. because the file does not exist.";
			debug($message);
			throw(new Exception($message));
		}
		
		
		# import the file
		require $path;
		
		# add location to array
		array_push(static::$_importedPackages, $package);
		return true;
	}
	
	
	
	/**
	* Determines if the given package name is an alias
	* 
	* @param string package
	* @return boolean
	*/
	
	final private static function _package_is_alias($package) {
		# the first character in an alias is a colon
		if(substr($package, 0, 1) !== ':') {
			return false;
		}
		return true;
	}
	
	
	
	/**
	* Gets a package name from a package alias
	* 
	* @param string alias
	*/
	
	final private static function _package_resolve_alias($alias) {
		
		# if the alias name is not valid format (does not start with :)
		if (!static::_package_is_alias($alias)) {
			throw new Exception("Could not resolve alias '$alias'. Not a valid alias");
		}
		
		# if the alias array is not defined
		if (!isset(Settings::$package_aliases)) {
			throw new Exception("Could not resolve alias '$alias'. Package alias configuration missing.");
		}
		
		# if the alias is not defined
		if (!array_key_exists($alias, Settings::$package_aliases)) {
			throw new Exception("Could not resolve invalid alias '$alias'");
		}
		
		return Settings::$package_aliases[$alias];
	}
}	