<?php

namespace Framework5;

/**
* Framework5 internationalization module loader
*/

# determine if valid languages array is set in the settings file
if (!isset(Settings::$languages) or empty(Settings::$languages))
	throw new Exception("valid languages array must be set in core.config.Settings");

# import required classes
import('core.controller.Language');
import('core.interface.ILanguagePack');
import('core.functions.language');