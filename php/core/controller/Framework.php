<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

abstract class Framework extends Controller {
	
	public function __construct() {
		# initialize the framework
		$this->initialize();
		
		# call Controller constructor
		parent::__construct();
	}
	
	public function __destruct() {
		
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function initialize() {
		
		# include default application exception handlers
		$this->import('core.exception.CustomException');
		$this->import('core.exception.AppException');
		
	}
	
	
	
	
	
	
	### --- Calculate Script Execution Time --- ###
	### TODO: break into controller.core.ExecutionTimer
	### TODO: $app = new Application($options = array('calculateExecTime' => true));
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	public function calculate_exec_time($log = false) {
		//$this->controllers['execTimer'];
	}
	
	public function getExecTime() {
		
	}
	
	private function logExecTime() {
		
	}
}