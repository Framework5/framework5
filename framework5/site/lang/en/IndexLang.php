<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class IndexLang implements \Framework5\ILanguagePack {
	
	public static function content() {
		return array(
			'welcome' => 'hello', //access as IndexLang:welcome
			
		);
	}
}