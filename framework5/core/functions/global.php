<?php

/**
* Global framework functions
* 	each function is accessable to all conrollers handled by the framework
*/

# import a package
if (!function_exists('import')) {
	 function import($package) {
	 	return \Framework5\Factory::import($package);
	}
}

# returns the classname of a given package
if (!function_exists('package_class')) {
	function package_class($package) {
		return \Framework5\Factory::package_class($package);
	}
}

# returns the base location of a given package
if (!function_exists('package_base')) {
	function package_base($package) {
		return \Framework5\Factory::package_base($package);
	}
}

# returns true if the package is a valid file
if (!function_exists('package')) {
	function package($package) {
		return \Framework5\Factory::package($package);
	}
}

# returns true if the package has baan loaded
if (!function_exists('loaded')) {
	 function loaded($package) {
	 	return \Framework5\Factory::loaded($package);
	}
}

# returns true if the object implements the interface
if (!function_exists('implement')) {
	function implement($ojbect, $interface) {
		return \Framework5\Factory::implement($ojbect, $interface);
	}
}

# render a view controller
if (!function_exists('execute')) {
	function execute($package, $options = null) {
		return \Framework5\Factory::execute($package, $options);
	}
}

# returns a single instance of a package
if (!function_exists('instance')) {
	function instance($package) {
		return \Framework5\Factory::instance($package);
	}
}

# helper function to determine the value of variables
if (!function_exists('trace')) {
	function trace($message) {
		return \Framework5\Logger::trace($message);
	}
}

# helper function to log the execution of the application
if (!function_exists('debug')) {
	function debug($message) {
		if (!\Framework5\Settings::$debug_mode) {
			return true;
		}
		return \Framework5\Debugger::debug($message, debug_backtrace());
	}
}