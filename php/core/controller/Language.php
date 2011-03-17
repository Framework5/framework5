<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

abstract class Language {

	private $language; //the selected language
	private $languages; //avaliable languages

	public function __construct($language) {
		//define avaliable languages
		$this->languages = array('English', 'Spanish', 'French');
		
		
		
		//set the selected langauge
		$this->setLanguage($language);
		
	}
	
	public function __destruct() {
		
	}
	
	
	
	/**
	* 
	* 
	* @author tmatthews (tmatthewsdev@gmail.com)
	*/
	
	private function setLanguage($language) {
		
		//verify selected language is avaliable
		switch($language){
			case: 'English':
				$this->language = $language;
				break;
				
			case: 'Spanish':
				$this->language = $language;
				break;
				
			case: 'French':
				$this->language = $language;
				break;
			
			default:
				$this->language = 'Invalid';
				//TODO return error
		}
		
		
		
		foreach($this->languages as $language){
			if($this->languages == $language){
				//set the current language
				$this->language = $language;
				//include language definition file
				require_once "../languages/{$this->language}.lang.php";
			}
		}
	}
}