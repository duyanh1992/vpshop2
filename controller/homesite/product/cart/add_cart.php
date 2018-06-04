<?php
if(isset($_GET['id_sp'])){
	$id_sp = $_GET['id_sp'];
	
	$cart = new Cart();
	$cart->addCart($id_sp);

	header('location:index.php?site=homesite&user_obj=user&user_act=user_portal&func=cart');
}

?>