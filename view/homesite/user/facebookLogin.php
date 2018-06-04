<?php
ob_start();
session_start();
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/VietProShop-MVC/');
include(SITE_ROOT.'model/user.php');
    $app_id = "165988420687268";
    $app_secret = "6e435545e7ad9a717aa5a3cc8d94a7ea";
    $redirect_uri = urlencode("http://localhost/VietProShop-MVC/controller/homesite/user/facebookLogin.php");    

    // Get code value
    $code = $_GET['code'];
    
    // Get access token info
    $facebook_access_token_uri = "https://graph.facebook.com/v2.8/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";    
    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        
    $response = curl_exec($ch); 
    curl_close($ch);

    // Get access token
    $aResponse = json_decode($response);
    $access_token = $aResponse->access_token;
    
    // Get user infomation
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        
    $response = curl_exec($ch); 
    curl_close($ch);
    
    $user = json_decode($response);

    //print_r($user);
    // Log user in
    //$_SESSION['user_login'] = true;
    //$_SESSION['user_name'] = $user->name;
    
    // echo "<pre>";
	// print_r($user);
    // echo "</pre>";
	// die();
	
	$_SESSION['user_facebook_name'] = $user->name;
	$_SESSION['user_facebook_id'] = $user->id;
	
	if(isset($_SESSION['user_facebook_name']) && isset($_SESSION['user_facebook_id'])){
	$username = $_SESSION['user_facebook_name'];
	$password = md5($_SESSION['user_facebook_id'].$_SESSION['user_facebook_name']);
	
	$user = new user();	
	$user->setUserName($username);
	$user->setUserPass($password);	

	if($user->checkUserLogin()){
		$_SESSION['username'] = $user->getUserName($username);	
		$_SESSION['username'];
		
		echo '<script type="text/javascript">
				window.location = "http://localhost/VietProShop-MVC/"
			</script>';
	}
	else{
		if($user->signUp()){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = 1;	
			
			echo '<script type="text/javascript">
				window.location = "http://localhost/VietProShop-MVC/"
			</script>';
		}
		else{
			$error = '<p style="color:red">Có lỗi. Xin thử lại sau</p>';
		}
	}
}

?>