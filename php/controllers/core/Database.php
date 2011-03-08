<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class Database {
	
	protected $db;
	
	protected function __construct() {
		
		# connect to the database
		try {
			# create catabase connection
			$this->db = new PDO("mysql:host=localhost;dbname=sandbox", 'root', 'root');
			
			# set default connetion properties
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo "Database connection error: " . $e->getMessage();
			$this->log_error($e->getMessage());
			die;
		}
		
		# set the defualt exception handler method
		@set_exception_handler(array($this, 'exception_handler'));
	}
	
	
	protected function __destruct() {
		# close the connection
		$this->db = null;
	}
	
	
	
	
	
	protected static function exception_handler($exception) {
		echo "Database error: " , $exception->getMessage(), "\n";
		$this->log_error($e->getMessage());
	}
	
	protected function log_error($error) {
		$error = "[".time()."] " . $error . "\n";
		//file_put_contents('log.txt', $error, FILE_APPEND);
	}
}