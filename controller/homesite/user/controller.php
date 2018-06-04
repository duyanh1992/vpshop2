<?php  
if(isset($_GET['user_act'])){
	switch($_GET['user_act']){
		case 'user_portal' : include('controller/homesite/user/user_portal.php');
		break;
	}
}
?>