<?php

namespace Framework5;

/*
* Framework5 internationalization support
* 
* this package is currently in development and is not yet documented
*/

class Language {
	
	//private static $_languages = Settings::$languages;
	
	private static $_default_language = 'en';
	
	private static $_imported_lang_packs = array();
	
	private static $_language; # the current language id (en,es,fr)
	
	
	
	public static function lang_set($language) {
		if (!in_array($language, array_keys(Settings::$languages)))
			throw new Exception("Language could not be set to '$language', not a valid language id");
		static::$_language = $language;
		return true;
	}
	
	
	
	public static function lang_get() {
		if (!isset(static::$_language) or empty(static::$_language)) return static::$_default_language;
		return static::$_language;
	}
	
	
	
	public static function lang_load($package) {
		
		# strip base and class from package
		$base = package_base($package);
		$lang = static::lang_get();
		$class = package_class($package);
		
		# construct package location with current or default language
		$package = "$base.$lang.$class";
		trace($package);
		
		debug("Language loading package '$package'");
		
		# if the package is not valid, throw exception
		if (!package($package)) {
			throw new Exception("Language pack '$package' could not be loaded because it does not exist");
		}
		
		# import the language package
		import($package);
		
		# add language classname to array
		if (in_array($class, static::$_imported_lang_packs))
			throw new Exception("Duplicate language pack '$class'");
		
		array_push(static::$_imported_lang_packs, $class);
		
		
	}
	
	
	
	// IndexLang.welcome
	public static function text($selector, $var = null) {
		$info = explode(':', $selector);
		$class = $info[0];
		$id = $info[1];
		return $class::content($id, $var);
	}
}