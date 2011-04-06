<?php

namespace Framework5;

/** 
* Framework5 Front Controller
* 	all http requests are handled by this file.
* 	the uri is retrieved by the Request class, and maps the uri array
* 	to one or more Application controller. the execute methood is
* 	then called on the controller. note that the Application also 
* 	handles all Exceptions caught during execution.
*/

try {
	# load Framework5
	require_once '../framework5/autoload.php';
	
	# get the request uri array
	$request = Request::uri_array();
	
	# get application controller from Framework5\Router
	$app_package = Router::resolve($request);
	
	# check if the application is a valid package
	if (package($app_package)) {
		
		import($app_package); # import the application
		$app = package_class($app_package); # get application classname
		$app = '\\Framework5\\' . $app; # add application namespace
		
		# check if class implements IApplication
		if (!implement($app, 'Framework5\IApplication'))
			throw new Exception('app must implement Framework5\IApplication');
		
		# execute the application
		debug('Application execution starting');
		$app::execute();
		debug('Application execution complete');
		
		# log execution stats
		if (Settings::$log_execution)
			Logger::log_execution();
		
		# log debug information
		if (Settings::$log_debug) 
			Logger::log_debug(Debugger::dump());
		
		die; # kill execution
	}
	
	# the application is not a valid package
	else {
		echo "Framework5 Front Controller could not import package '$app_package', configured in Framework5\Router";
		die;
	}
}

catch (Exception $e) {
	$app::exception_handler($e);
}