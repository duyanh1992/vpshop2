<?php
if(isset($_POST['submit-login'])){
	if(isset($_POST['username'])){
		if($_POST['username'] == NULL){
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng nhập</p>';
		}
		else{
			$username = $_POST['username'];
		}
	}
	
	if(isset($_POST['password'])){
		if($_POST['password'] == NULL){
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng nhập</p>';
		}
		else{
			$password = $_POST['password'];
		}
	}
	
	if($username && $password){
		$user = new User();	
		$user->setUserName($username);
		$user->setUserPass($password);	
		if($user->checkUserLogin()){
			$_SESSION['username'] = $user->getUserName($username);	
			echo '<script type="text/javascript">
					window.location = "index.php"
				</script>';
		}
		else{
			$error = '<p style="color:red">Người dùng không tồn tại</p>';
		}
	}
}
?>
<div class="prd-block">
	<h2>
		<?php
			if(!isset($error)){
				echo 'đăng nhập hệ thống';
			}
			else{
				echo $error;
			}
		?>
	</h2>
	<fieldset>
		<form action="" method="post">
			<div id="login-form">
				<div class="label">tên đăng nhập</div>
				<input type="text" name="username" />
				<div class="clear"></div>
				<br />
				<div class="label">mật khẩu</div>
				<input type="password" name="password" />
				<div class="clear"></div>
				<br />
				<input type="submit" name="submit-login" value="Đăng nhập"/>
				<div class="clear"></div>
				<p>Hoặc đăng nhập bằng : </p>
				<a href="https://www.facebook.com/dialog/oauth?client_id=165988420687268&redirect_uri=http://localhost/VietProShop-MVC/controller/homesite/user/facebookLogin.php&scope=public_profile"><img src="common/user/images/facebook.jpg" alt="facebook" /></a>
				<a href="index.php?site=homesite&user_obj=user&user_act=user_portal&func=googleLogin"><img src="common/user/images/google.jpg" alt="google" /></a>
			</div>
		</form>
	</fieldset>
</div>        