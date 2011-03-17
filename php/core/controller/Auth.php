<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Auth {
	
	private $authenticated; //is the user authenticated
	private $langauge; //the users prefered language
	
	
	
	public function __construct() {
		session_start();
	}
	
	public function __destruct() {
		
	}
	
	
	public function login($email, $password) {
		
	}
	
	
	
}