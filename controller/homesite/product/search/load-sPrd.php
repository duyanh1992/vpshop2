<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/VietProShop-MVC/');
include(SITE_ROOT.'model/product.php');
if(isset($_POST['page']) && isset($_POST['rowPerPage']) && isset($_POST['sText'])){
	$page = $_POST['page'];
	$rowPerPage = $_POST['rowPerPage'];
	$sText = $_POST['sText'];
	
	$arrStext = explode(' ',$sText);
	$stext = implode('%',$arrStext);
	$newStext = '%'.$stext.'%';
	
	$start = ($page * $rowPerPage) - $rowPerPage;
	$listProduct = new Product();
	$data = $listProduct->searchPrd($newStext);
	
	$totalPrd = $listProduct->num_rows();
	$totalPage = ceil($totalPrd/$rowPerPage);
	
	$listLimitProduct = new Product();				
	$data2 = $listProduct->searchLimitPrd($newStext, $start, $rowPerPage);
	
	$listPage = $listProduct->paginateProduct($page, $totalPage, NULL, $totalPage, $stext);

	
	$result = array();
	$result['data'] = $data2;
	$result['listPage'] = $listPage;
	$result['totalPage'] = $totalPage;
	
	echo json_encode($result);
}
?>