<?php  
if(isset($_GET['admin_obj'])){
	switch($_GET['admin_obj']){
		case 'user' : include('controller/admin/user/controller.php');	
		break;

		case 'product' : include('controller/admin/product/controller.php');
		break;
	}
}
?>