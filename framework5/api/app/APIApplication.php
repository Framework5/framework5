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
		
		# resolve request to a page controller
		import('api.config.Router');
		$package = APIRouter::resolve(\Framework5\Request::uri_array());
		
		# display the controller
		execute($package);
		return true;
	}
}