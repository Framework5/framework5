<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class ListUsers implements Framework5\IScript {
	
	public static function execute() {
		
		$users = array('Tyler', 'Anthony');
		echo json_encode($users);
	}
	
}