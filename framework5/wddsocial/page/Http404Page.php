<?php

//require_once '../core/Controller.php';

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Http404Page implements \Framework5\IScript {

	public static function execute() {
		echo "{404 page}<br/>";
	}
}