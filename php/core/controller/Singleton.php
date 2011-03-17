<?php

abstract class Singleton
{
	/**
	* Instance
	*
	* @var Singleton
	*/
	protected static $_instance;
	
	/**
	* Constructor
	*
	* @return void
	*/
	protected function __construct() {}
	
	
	# prevent instance cloning
	final private function __clone() {
		throw new Exception("Singleton classes cannot be cloned");
	}
	
	
	/**
	* Get instance
	*
	* @return Singleton
	*/
	public final static function get_instance() {
		if (null === static::$_instance) {
			static::$_instance = new static();
		}	
		return static::$_instance;
	}
}