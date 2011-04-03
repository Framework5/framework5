<?php

/*
* Application Request Router
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class APIRouter implements Framework5\IRouter {
	
	# route uri path to a controller
	public static function resolve($request) {
		
		switch ($request[1]) {
			case '':
				return 'api.request.InvalidRequest';
			
			case 'users':
				return 'api.request.ListUsers';
			
			default:
				return 'api.request.InvalidRequest';
		}
	}
}