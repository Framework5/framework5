<?php

//require_once '../core/Controller.php';

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Http404 implements \Framework5\IExecutable {

	public static function execute() {
		echo "{404 page}<br/>";
	}
}