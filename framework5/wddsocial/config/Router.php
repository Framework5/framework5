<?php

namespace App;

/*
* Application Request Router
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Router implements \Framework5\IRouter {
	
	# route uri path to a controller
	public static function resolve($request) {
		
		switch ($request) {
			case '':
				return 'wddsocial.page.IndexPage';
				
			case 'user':
				return 'wddsocial.page.ProfilePage';
			
			case 'about':
				return 'wddsocial.page.AboutPage';
			
			default:
				return 'wddsocial.page.Http404';
		}
	}
}