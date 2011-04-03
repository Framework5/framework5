<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class InvalidRequest implements Framework5\IScript {
	
	public static function execute() {
		echo json_encode('invalid request');
	}
	
}