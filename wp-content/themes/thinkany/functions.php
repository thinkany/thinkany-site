<?php
// setup theme name for use with JS,CSS etc.
define('SITE_NAME', 'thinkany');

$functions = scandir( dirname(__FILE__).'/functions' );

foreach( $functions as $file ) {
	if( $file[0] != '.' && $file != 'core' ){
		include('functions/'.$file);
	}
}