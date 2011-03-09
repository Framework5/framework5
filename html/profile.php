<?php

# include and instantiate the Application
require_once 'Application.php';
$app = new Application();

try {
	# load required resources
	$app->import('controllers.core.Template');
	$template = new Template();
	
	$app->import('controllers.core.Auth');
	$auth = new Auth();
	
	$app->import('controllers.site.Profile');
	$profile = new Profile();
	
}
catch (Exception $e) {
	$app->log_error($e);
	
	# display the error page
	$options = array('message' => $e->getMessage());
	$template->display('error_page', $options);
}



# display page
$template->display('doc_header', array('title' => 'wddsocial'));

//$template->display('header');

//$template->display('footer');