<?php

namespace Framework5;

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

interface IApplication {
	public static function execute();
	public static function exception_handler($e);
	//public static function shutdown_handler();
	//public static function error_handler($number, $message, $file, $line, $context);
}

?>