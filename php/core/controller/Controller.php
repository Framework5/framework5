<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

abstract class Controller {

	private $_factory;
	
	protected function __construct() {
		# reference factory instance
		$this->_factory = Factory::get_instance();
	}
	
	protected function __destruct() {
		
	}
	
	
	
	/**
	* Make methods accessible directly from Controller
	* 
	* @param $package
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	final public function import($package) {
		$this->_factory->import($package);
	}
	
	final public function instance($package) {
		return $this->_factory->instance($package);
	}
	
	
	
	
	
	/**
	* Logs an exception to the database
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	* @param Exception
	* @return error_id - the insert id of the error
	*/
	
	protected function log_error($e) {
		//id, type, datetime, message, error_code, file, line, trace(serialize)
		
		// $logger = $this->instance(':logger');
		
		echo 'type'.get_class($e);
		echo '<br/>';
		echo 'getMessage'.$e->getMessage();
		echo '<br/>';
    	echo 'getCode'.$e->getCode();
    	echo '<br/>';
    	echo 'getFile'.$e->getFile();
    	echo '<br/>';
    	echo 'getLine'.$e->getLine();
    	echo '<br/>';
    	echo 'getTrace';
    	print_r($e->getTrace());
		
		//file_put_contents('log.txt', $error, FILE_APPEND);
		//
		//$error_id = insert id
		
		return $error_id;
	}

}