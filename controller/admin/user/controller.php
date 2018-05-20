<?php  
if(isset($_GET['user_act'])){
	switch($_GET['user_act']){
		case 'login' : 
			echo '<link rel="stylesheet" type="text/css" href="common/admin/css/login.css"/>';
			include('controller/admin/user/login.php');	
			break;

		case 'logout' : 
			include('controller/admin/user/logout.php');	
			break;	

		case 'admin_portal' :
			include('controller/admin/user/admin_portal.php');	
			break;	
	}
}
?>