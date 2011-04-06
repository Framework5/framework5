<?php

/*
* Sample language pack, English
*/

class ProfileLang implements \Framework5\ILanguagePack {
	
	public static function content($var) {
		return array(
			'intro' => "{$var['name']} est un &eacute;tudiant de {$var['age']} ans originaire du {$var['location']} qui a commen&ccedil;&eacute; &agrave; Full Sail en {$var['date']}",
		);
	}
}