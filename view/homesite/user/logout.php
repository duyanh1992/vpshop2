<?php
if(isset($_SESSION['username'])){
	$user = new User();
	if($user->logout()){
		echo '<script type="text/javascript">
				window.location = "index.php";
			  </script>';
	}
}
?>