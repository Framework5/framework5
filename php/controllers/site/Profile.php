<?php

//require_once '../core/Controller.php';

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Profile {
	
	private $userid;
	
	
	public function __construct($url=null) {
		if($url){
			$this->setUserUrl($url);
		}
	}
	
	public function __destruct() {
		
	}
	
	
	public function setUserUrl($url) {
		if($this->validUrl($url)){
			//set the userid property
			$this->userid = $this->getUseridFromUrl($url);
		}else{
			throw new Exception(); //TODO
		}
	}
	
	
	public function setUserid($userid) {
		
	}
	
	
	
	/**
	* Validates a users profile url
	* 
	* @return bool
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	private function validUrl($url) {
	
	}
	
	
	
	private function getUseridFromUrl($url) {
		
	}
	
}