<?php

/*
* Default Application exception class
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class AppException extends CustomException {
	
	
	public function __construct($message = null, $code = 0) {
		parent::__construct($message, $code);
		
	}
	
	public function __destruct() {
		
		
	}
}