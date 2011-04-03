<?php

namespace Framework5;

/*
* Framework5 configuration file
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Settings {
	
	const PRODUCTION_MODE = 0; # Development 0, Production 1;
	
	
	public static $log_execution = true;
	public static $log_debug = true;
	public static $log_exception = true;
	
	public static $dbinfo = array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => 'root',
		'dbname' => 'sandbox'
	);
	
	public static $package_aliases = array(
		':db' => 'core.controller.Database',
		':template' => 'core.controller.Template'
	);
}