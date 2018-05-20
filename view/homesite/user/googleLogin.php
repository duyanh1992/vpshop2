<?php
$google_client_id 		= '616515585823-9eh5bhtla6kp7fcvr90rok3lnmrjtadv.apps.googleusercontent.com';
$google_client_secret 	= 'mRyf5jExst_b3ZM5dkYKtDf_';
$google_redirect_url 	= 'http://localhost/VietProShop-MVC/index.php?site=homesite&user_obj=user&user_act=user_portal&func=googleLogin'; //path to your script
$google_developer_key 	= 'AIzaSyA9gsQhx-UfDCCpXAakBg-riVcQ4p6gYaM';
 

$gClient = new Google_Client();
$gClient->setApplicationName('Login to demo.trinhtuantai.com');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
}
else {
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) //user is not logged in, show login button
{
	header("Location: ".$authUrl);
} 
else // user logged in 
{	
	//list all user details
	// echo '<pre>'; 
	// print_r($user);
	// echo '</pre>';	
	// die();
	$_SESSION['user_google_name'] = $user['name'];
	$_SESSION['user_google_mail'] = $user['email'];
	$_SESSION['user_google_id'] = $user['id'];
}

if(isset($_SESSION['user_google_name']) && isset($_SESSION['user_google_mail']) && isset($_SESSION['user_google_id'])){
	$username = $_SESSION['user_google_name'];
	$password = md5($_SESSION['user_google_id'].$_SESSION['user_google_mail']);
	$email = $_SESSION['user_google_mail'];
	
	$user = new user();	
	$user->setUserName($username);
	$user->setUserPass($password);	
	$user->setEmail($email);	
	
	if($user->checkUserLogin()){
		$_SESSION['username'] = $user->getUserName($username);	
		header('location:index.php');
	}
	else{
		if($user->signUp()){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = 1;	
		
		header('location:index.php');
		}
		else{
			$error = '<p style="color:red">Có lỗi. Xin thử lại sau</p>';
		}
	}
}
?>