<?php
include_once('database.php');
if(!isset($_SESSION)){
	session_start();
}
class Cart{
	public function addCart($id_sp){
		$prd = NULL;
		
		if(!isset($_SESSION['cart'][$id_sp])){
			$_SESSION['cart'][$id_sp] = 1;
		}
		else{
			$_SESSION['cart'][$id_sp]+=1;
		}
		$prd = $_SESSION['cart'][$id_sp];
		return $prd;
	}
	
	public function delCart($id_sp){
		if($id_sp == 0){
			unset($_SESSION['cart']);
			return true;
		}
		if($id_sp != 0){
			unset($_SESSION['cart'][$id_sp]);
			return true;
		}
		return false;
	}
}
?>