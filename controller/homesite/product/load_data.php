<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
include(SITE_ROOT.'model/Product.php');

if(isset($_POST['product_name']) && isset($_POST['action']) && isset($_POST['function'])){
	if($_POST['action'] == 'checkName' && $_POST['function'] == 'add'){
		$prdName = ($_POST['product_name']);
		$prd = new Product();
		$prd->setName($prdName);
		echo $prd->checkAddPrdName();
	}
}

if(isset($_POST['page']) && isset($_POST['rowPerPage']) && isset($_POST['id_dm'])){
	$page = $_POST['page'];
	$rowPerPage = $_POST['rowPerPage'];
	$id_dm = $_POST['id_dm'];

	$start = ($page * $rowPerPage) - $rowPerPage;
	$listProduct = new Product();
	$data = $listProduct->listAllPrdByCateId($id_dm);
	
	$totalPrd = $listProduct->num_rows();
	$totalPage = ceil($totalPrd/$rowPerPage);
	
	$listLimitProduct = new Product();				
	$data2 = $listProduct->listPrdByCateId($id_dm, $start, $rowPerPage);
	
	$listPage = $listProduct->paginateProduct($page,$totalPage,NULL,$totalPage, NULL);

	
	$result = array();
	$result['data'] = $data2;
	$result['listPage'] = $listPage;
	$result['totalPage'] = $totalPage;
	
	echo json_encode($result);
}
?>