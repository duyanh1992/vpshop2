<?php
spl_autoload_register(function ($filename) {
    include_once('model/'.$filename.'.php');	
});

// function __autoload($filename){
	// include_once('../mainclass/'.$filename.'.php');	
// }
?>