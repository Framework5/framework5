<?php

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
	$request = \Framework5\Request::uri_array();
	
	# get application controller from Framework5\Router
	$app_package = \Framework5\Router::resolve($request);
	
	# check if the app is a valid package
	if (package($app_package)) {
		
		import($app_package); # import the app
		$app = package_class($app_package); # get app classname
		
		# check if class implements IApplication
		if (!implement($app, 'Framework5\IApplication'))
			throw new Exception('app must implement Framework5\IApplication');
		
		# execute the application
		$app::execute();
	}
	else {
		echo "Framework5 Front Controller could not import package '$app_package', configured in Framework5\Router";
		die;
	}
}

catch (Exception $e) {
	$app::exception_handler($e);
}