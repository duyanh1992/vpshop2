<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/VietProShop-MVC/');
include(SITE_ROOT.'model/user.php');
if(isset($_POST['name']) && isset($_POST['action'])){
	$name = $_POST['name'];
	
	$user = new User();
	$user->setUserName($name);
	$result = array();
	if(($user->checkName()) > 0){
		$result['status'] = 'no';
	}
	else{
		$result['status'] = 'ok';
	}
	echo json_encode($result);
}
?>