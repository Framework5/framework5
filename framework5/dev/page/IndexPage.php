<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class IndexPage implements \Framework5\IScript {
	
	public static function execute() {
		echo 'Framework5 Debugger';
		
		echo 'nav: ';
		echo '<a href="requests">requests</a>';
		//trigger_error("Error Triggered", E_ERROR);
		//throw new Exception('message');
	}
}