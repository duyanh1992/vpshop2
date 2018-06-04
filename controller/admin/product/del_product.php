<?php
if(isset($_GET['id_sp'])){
	if(($_GET['id_sp']) != null){
		$id_sp = $_GET{'id_sp'};
		$prd = new Product();
		$prd->setId($id_sp);
		if($prd->deleteProduct()){
			header('location:index.php?site=admin&admin_obj=product&prd_act=list_product');
		}
	}
}
?>