<?php

namespace Framework5;

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Router implements IRouter {
	
	public static function resolve($request) {
		switch ($request[0]) {
			case 'api':
				return 'api.app.APIApplication';
			
			case 'dev':
				return 'dev.app.DeveloperTools';
			
			default:
				return 'site.app.Application';
		}
	}
}