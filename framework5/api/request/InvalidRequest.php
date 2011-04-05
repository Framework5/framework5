<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class InvalidRequest implements Framework5\IExecutable {
	
	public static function execute() {
		echo json_encode('invalid request');
	}
	
}