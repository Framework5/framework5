<?php

/*
* Sample language pack, English
*/

class ProfileLang implements \Framework5\ILanguagePack {
	
	public static function content($var) {
		return array(
			'intro' => "{$var['name']} is a {$var['age']}-year-old, on-campus student from {$var['location']} who began Full Sail in {$var['date']}",
		);
	}
}