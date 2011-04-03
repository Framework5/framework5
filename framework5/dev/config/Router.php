<?php

/*
* Application Request Router
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Router {
	
	# route uri path to a controller
	public static function resolve($request) {
		
		# resolve the first segment of the array to a page controller
		switch ($request[0]) {
			case '':
				return 'dev.page.IndexPage';
			
			case 'requests':
				return 'dev.page.Requests';
			
			default:
				return 'dev.page.Http404Page';
		}
	}
}