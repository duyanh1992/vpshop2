<form method="post">
<div id="form-login">
	<h2>
		<?php
			if(!isset($error)){
				echo 'đăng nhập hệ thống quản trị';
			}
			else{
				echo $error;
			}
		?>
	</h2>
    <ul>
        <li><label>tài khoản</label><input type="text" name="name" /></li>
        <li><label>mật khẩu</label><input type="password" name="pass" /></li>
        <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
        <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
    </ul>
</div>
</form>
