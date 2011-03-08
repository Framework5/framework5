<?php

define('DOCROOT', __DIR__.DIRECTORY_SEPARATOR);

$framework_path= '../wddsocial/';

(!is_dir($framework_path) and is_dir(DOCROOT.$framework_path)) and $framework_path = DOCROOT.$framework_path;

//echo $framework_path;

define('FRAMEWORK_PATH', realpath($framework_path).DIRECTORY_SEPARATOR);

echo constant('FRAMEWORK_PATH');