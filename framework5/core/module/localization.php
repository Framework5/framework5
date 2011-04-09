<?php

namespace Framework5;

/**
* Framework5 internationalization module loader
*/

# import required classes
import('core.module.localization.config.LanguageSettings');
import('core.module.localization.interface.ILanguagePack');
import('core.module.localization.Language');
import('core.module.localization.functions');

# determine if valid languages array is set in the settings file
if (!isset(LanguageSettings::$languages) or empty(LanguageSettings::$languages))
	throw new Exception(
		"Could not import localization module. Valid languages array must be set in LanguageSettings");