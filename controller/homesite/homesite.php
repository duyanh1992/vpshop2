<?php  
if(isset($_GET['user_obj'])){
	switch($_GET['user_obj']){
		case 'user' : include('controller/homesite/user/controller.php');	
		break;

		case 'product' : include('controller/homesite/product/controller.php');	
		break;
	}
}
?>