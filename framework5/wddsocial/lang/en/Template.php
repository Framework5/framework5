<?php

/*
* WDD Social: Template Language Pack
*/

class TemplateLang implements \Framework5\ILanguagePack {
	
	public static function content($var) {
		return array(
			# navigation elements
			'people' => 'People',
			'projects' => 'Projects',
			'articles' => 'articles',
			'courses' => 'Courses',
			'events' => 'Events',
			'jobs' => 'Jobs',
			
			# header
			'register' => 'Register',
			'signin' => 'Sign In',
			'messages' => 'Messages',
			'account' => 'Account',
			'signout' => 'Sign Out',
			'search' => 'Search'
			
			# footer
			'copyright' => '&copy; 2011 WDD Social',
			'developer' => 'Developer',
			'about' => 'About',
			'contact' => 'Contact',
			'terms' => 'Terms',
			'privacy' => 'Privacy',
			
		);
	}
}