<?php

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/VietProShop-MVC/');

include(SITE_ROOT.'model/Product.php');

if(isset($_POST['product_name']) && isset($_POST['action']) && isset($_POST['function'])){

	if($_POST['action'] == 'checkName' && $_POST['function'] == 'add'){

		$prdName = ($_POST['product_name']);

		$prd = new Product();

		$prd->setName($prdName);

		echo $prd->checkAddPrdName();

	}

	

	if($_POST['action'] == 'checkName' && $_POST['function'] == 'edit'){

		if(isset($_POST['prdId'])){

			$prdId = $_POST['prdId'];

			$prdName = ($_POST['product_name']);

			$prd = new Product();

			$prd->setId($prdId);

			$prd->setName($prdName);

			echo $prd->checkEditPrdName();

		}

	}

}



if(isset($_POST['page']) && isset($_POST['rowPerPage'])){

	$page = $_POST['page'];

	$rowPerPage = $_POST['rowPerPage'];



	$listAllProduct = new Product();

	$data = $listAllProduct->listAllProduct();

	

	$totalPrd = $listAllProduct->num_rows();

	$totalPage = ceil($totalPrd/$rowPerPage);

	$start = ($page * $rowPerPage) - $rowPerPage;

	

	$listLimitProduct = new Product();				

	$data2 = $listAllProduct->listLimitProduct($start, $rowPerPage);

	

	$listPage = $listAllProduct->paginateProduct($page,$totalPage,NULL,$totalPage, NULL);



	

	$result = array();

	$result['data'] = $data2;

	$result['listPage'] = $listPage;

	$result['totalPage'] = $totalPage;

	

	echo json_encode($result);

}

?>