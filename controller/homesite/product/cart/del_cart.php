<?php
if(isset($_GET['id_sp']) && ($_GET['id_sp']!= null)){
	$id_sp = $_GET['id_sp'];
	$cart = new Cart();
	if($cart->delCart($id_sp)){
		header('location:index.php?site=homesite&user_obj=user&user_act=user_portal&func=cart');

	}	
}
?>