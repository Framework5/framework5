<?php


/*
* Example secondary application
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/


final class APIApplication extends \Framework5\ApplicationBase implements \Framework5\IApplication {
	
	/**
	* Execute a request. Called by the front controller.
	*/
	
	public static function execute() {
		debug('APIApplication execution starting');
		
		#TODO set error handler
		//set_error_handler('Application::error_handler', E_ALL);
		//register_shutdown_function('Application::shutdown_handler');
		
		# resolve request to a page controller
		import('api.config.Router');
		$package = APIRouter::resolve(\Framework5\Request::uri_array());
		
		# display the controller
		display($package);
		
		# log execution stats
		if (\Framework5\Settings::$log_execution) \Framework5\Logger::log_execution();
		
		# log debug information
		if (\Framework5\Settings::$log_debug) \Framework5\Logger::log_debug(\Framework5\Debugger::dump());
		
		
		debug('APIApplication execution complete');
		
		die; # kill execution
	}
}