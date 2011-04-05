<?php

/*
* Application controller - default Primary Controller for Framework5
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

final class DeveloperTools extends \Framework5\ApplicationBase implements \Framework5\IApplication {
	
	/**
	* Execute a request. Called by the front controller.
	*/
	
	public static function execute() {
		debug('DeveloperApplication execution starting');
		
		# resolve request to a page controller
		import('dev.config.Router');
		$package = Router::resolve(\Framework5\Request::uri_array());
		
		# display the controller
		execute($package);
		
		# log execution stats
		if (\Framework5\Settings::$log_execution) \Framework5\Logger::log_execution();
		
		# log debug information
		if (\Framework5\Settings::$log_debug) \Framework5\Logger::log_debug(\Framework5\Debugger::dump());
		
		debug('DeveloperApplication execution complete');
		die; # kill execution
	}
}