<?php

/*
* Application controller - default Application Controller for Framework5
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

final class WDDSocialApplication extends \Framework5\ApplicationBase implements \Framework5\IApplication {
	
	/**
	* Execute a request. Called by the front controller.
	*/
	
	public static function execute() {
		debug('Application execution starting');
		
		# resolve request to a page controller
		import('wddsocial.config.Router');
		$package = Router::resolve(\Framework5\Request::uri_array());
		
		# enable localization module
		debug("Loading localization module");
		import('core.module.localization');
		lang_set('en');
		
		# display the controller
		display($package);
		
		# log execution stats
		if (\Framework5\Settings::$log_execution) \Framework5\Logger::log_execution();
		
		# log debug information
		if (\Framework5\Settings::$log_debug) \Framework5\Logger::log_debug(\Framework5\Debugger::dump());
		
		debug('Application execution complete');
		die; # kill execution
	}
}