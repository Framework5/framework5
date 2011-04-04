<?php

/*
* Sample page script to demonstrate the language features
*/

class LangPage implements \Framework5\IScript {
	
	public static function execute() {
		
		echo "{language test page}<br/>";
		
		
		lang_load('site.lang.IndexLang');
		echo text('IndexLang:welcome', array('name' => 'Tyler'));
		
	}
}