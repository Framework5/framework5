<?php

namespace Framework5;

/*
* Framework5 configuration file
*/

class LanguageSettings {
	
	# languages supported
	public static $languages = array(
		'en' => 'English',
		'es' => 'Spanish',
		'fr' => 'French'
	);
	
	# used for language pack autoloading
	public static $language_packs = array(
		'DateLang' => 'wddsocial.lang.DateLang',
		
	);
}