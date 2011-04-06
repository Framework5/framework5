<?php

/*
* Sample language pack, English
*/

class ProfileLang implements \Framework5\ILanguagePack {
	
	public static function content($id, $var) {
		
		switch ($id) {
			case 'intro':
				return "{$var['name']} is a {$var['age']}-year-old, on-campus student from {$var['location']} who began Full Sail in {$var['date']}";
			
			default:
				throw new Exception("Language pack content '$id' not found");
		}
	}
}