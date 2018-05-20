<?php
if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	header('location:index.php?site=admin&admin_obj=user&user_act=login');
}
?>