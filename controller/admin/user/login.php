<?php  
if(isset($_POST['submit'])){
	if(isset($_POST['name'])){
		if($_POST['name'] == NULL){
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng nhập</p>';
		}
		else{
			$name = $_POST['name'];
		}
	}
	
	if(isset($_POST['pass'])){
		if($_POST['pass'] == NULL){
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng nhập</p>';
		}
		else{
			$pass = $_POST['pass'];
		}
	}
	
	if(isset($name) && isset($pass)){
		$checkLogin = new user();	
		$checkLogin->setUserName($name);
		$checkLogin->setUserPass($pass);	
		if($checkLogin->checkLogin()){
			$_SESSION['username'] = $checkLogin->getUserName($name);	
			$_SESSION['level'] = 2;	
		}
		else{
			$error = '<p style="color:red">Người dùng không tồn tại</p>';
		}
	}
}

if(isset($_SESSION['username']) && isset($_SESSION['level']) && $_SESSION['level'] == 2){
	header('location:index.php?site=admin&admin_obj=user&user_act=admin_portal');
}
else{
	include('view/admin/user/login.php');
}
?>