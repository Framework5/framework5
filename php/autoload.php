<?php



call_user_func(function() {
	
	# preformance variables
	define('EXEC_START_TIME', microtime(true));
	define('EXEC_START_MEM', memory_get_usage());
	
	# general properties
	define('EXT', '.php');
	
	# configure relative directories
	define('DIR_CONFIG', 'config/');
	define('DIR_CONTROLLERS', 'controllers/');
	define('DIR_EXCEPTIONS', 'exceptions/');
	define('DIR_LANGUAGES', 'languages/');
	define('DIR_MODELS', 'models/');
	define('DIR_VIEWS', 'views/');
	
	# configure absolute paths
	define('PATH_FRAMEWORK', __DIR__.DIRECTORY_SEPARATOR);
	
	# include standard objects
	require_once 'core/controller/Controller.php';
	require_once 'core/controller/Singleton.php' ;
	
	# include framework objects
	require_once 'core/controller/Factory.php';
	require_once 'core/controller/Framework.php';
	
});