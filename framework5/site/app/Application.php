<?php

namespace Framework5;

/*
* Application controller - default Application Controller for Framework5
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

final class Application extends ApplicationBase implements IApplication {
	
	/**
	* Execute a request. Called by the front controller.
	*/
	
	public static function execute() {
		debug('Application execution starting');
		
		# resolve request to a page controller
		import('site.config.Router');
		$package = \Router::resolve(Request::uri_array());
		
		# enable localization module
		debug("Loading localization module");
		import('core.module.localization');
		lang_set('en');
		
		# display the controller
		display($package);
		return true;
	}
}