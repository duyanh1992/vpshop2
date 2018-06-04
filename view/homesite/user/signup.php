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
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng ký</p>';
		}
		else{
			$password = $_POST['password'];
		}
	}
	
	if(isset($_POST['email'])){
		if($_POST['email'] == NULL){
			$error = '<p style="color:red">Kiểm tra lại thông tin đăng ký</p>';
		}
		else{
			$email = $_POST['email'];
		}
	}
	
	if(isset($username) && isset($password) && isset($email)){
		$user = new User();	
		$user->setUserName($username);
		$user->setUserPass($password);	
		$user->setEmail($email);	
		if($user->signUp()){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = 1;	
			
			echo "<script type='text/javascript'>
					window.location = 'index.php'
				  </script>";
		}
		else{
			$error = '<p style="color:red">Có lỗi. Xin thử lại sau</p>';
		}
	}
}


?>
<div class="prd-block">
	<h2>
		<?php
			if(!isset($error)){
				echo 'đăng ký thành viên mới';
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
				<input type="text" name="username" /><br /><span id="name-error"></span>
				<div class="clear"></div>
				<br />
				<div class="label">mật khẩu</div>
				<input type="password" name="password" />
				<div class="clear"></div>
				<br />
				
				<div class="label">email</div>
				<input type="text" name="email" />
				<div class="clear"></div>
				<br />
				<input type="submit" name="submit-login" value="Đăng ký"/>
				<div class="clear"></div>
			</div>
		</form>
	</fieldset>
</div>        