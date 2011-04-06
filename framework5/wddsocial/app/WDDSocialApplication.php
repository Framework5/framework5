<?php

namespace Framework5;

/*
* Application controller - default Application Controller for Framework5
* 
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

final class WDDSocialApplication extends ApplicationBase implements IApplication {
	
	/**
	* Execute a request. Called by the front controller.
	*/
	
	public static function execute() {
		
		# enable localization module
		debug("Loading localization module");
		import('core.module.localization');
		lang_set('en'); # set current lang
		
		# resolve request to a page controller
		import('wddsocial.config.Router');
		$package = \App\Router::resolve(Request::segment(0));
		
		# execute the controller
		execute($package);
		return true;
	}
}