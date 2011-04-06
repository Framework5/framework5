<?php

/*
* Sample language pack, English
*/

class ProfileLang implements \Framework5\ILanguagePack {
	
	public static function content($id, $var) {
		
		switch ($id) {
			case 'intro':
				return "{$var['name']} est un &eacute;tudiant de {$var['age']} ans originaire du {$var['location']} qui a commen&ccedil;&eacute; &agrave; Full Sail en {$var['date']}";
			
			default:
				throw new Exception("Language pack content '$id' not found");
		}
	}
}