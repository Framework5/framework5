<?php

/*
*
* Author: Anthony Colangelo (anthony@acolangelo.com)
*
*/
class Page{
	private $page;
	private $title;
	public $backToHome;
	public $urlArray;
	
	public function __construct($title = ""){
		$this->title = $title;
		$this->urlArray = explode('/',substr($_SERVER['REQUEST_URI'],26));
		$this->backToHome = '';
		for($i = 0; $i<count($this->urlArray)-1; $i++){
			$this->backToHome .= '../';
		}
		$this->page = '';
		$this->header();
	}
	
	public function __destruct(){
		
	}
	
	/*
	*
	* Author: Anthony Colangelo (anthony@acolangelo.com)
	*
	*/
	private function header(){
		$this->page .= <<<EOD
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>WDD Social{$this->title}</title>
		<meta name="description" content="">
		<meta name="author" content="Anthony Colangelo (http://www.acolangelo.com)">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="{$this->backToHome}favicon.ico">
		<link rel="apple-touch-icon" href="{$this->backToHome}apple-touch-icon.png">
		<link rel="stylesheet" href="{$this->backToHome}css/style.css?v=2">
	  	<script src="{$this->backToHome}js/libs/modernizr-1.6.min.js"></script>
	</head>
	<body>
		<header></header>
		<section id="content">
EOD;
	}
	
	/*
	*
	* Author: Anthony Colangelo (anthony@acolangelo.com)
	*
	*/
	public function content($content){
		$this->page .= $content;
	}
	
	/*
	*
	* Author: Anthony Colangelo (anthony@acolangelo.com)
	*
	*/
	private function footer(){
		$this->page .= <<<EOD
		
		</section><!-- END CONTENT -->
		<footer></footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		<script>!window.jQuery && document.write(unescape('%3Cscript src="{$this->backToHome}js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>
		<script src="{$this->backToHome}js/plugins.js"></script>
		<script src="{$this->backToHome}js/script.js"></script>
		<!--[if lt IE 7 ]>
			<script src="js/libs/dd_belatedpng.js"></script>
			<script> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
		<![endif]-->
		<script>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'ACCOUNT NUMBER']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		</script>
	</body>
</html>
EOD;
	}
	
	/*
	*
	* Author: Anthony Colangelo (anthony@acolangelo.com)
	*
	*/
	public function display(){
		$this->footer();
		return $this->page;
	}
}
?>