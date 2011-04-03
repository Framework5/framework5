<?php

//require_once '../core/Controller.php';

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class LangPage implements \Framework5\IScript {
	
	public static function execute() {
		
		echo "{language test page}<br/>";
		
		import('core.controller.Language');
		import('core.interface.ILanguagePack');
		
		Language::lang_set('en');
		Language::lang_load('site.lang.IndexLang');
		echo Language::lang('IndexLang:welcome');
		
		//echo Language::lang('IndexLang:welcome', $params); #TODO
	}
}