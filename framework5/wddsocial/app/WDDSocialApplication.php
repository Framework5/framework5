<?php

namespace Framework5;

/*
* WDDSocialApplication controller
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
		#TODO change to module();
		//import('core.module.localization.LocalizationModule');
		execute('core.module.localization.LocalizationModule');
		lang_set('en');
		
		# resolve request to a page controller
		import('wddsocial.config.Router');
		$package = \App\Router::resolve(Request::segment(0));
		
		# execute the controller
		execute($package);
		return true;
	}
}