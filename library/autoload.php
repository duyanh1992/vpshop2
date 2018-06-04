<?php

spl_autoload_register(function ($filename) {

    include_once('model/'.$filename.'.php');	

});

?>