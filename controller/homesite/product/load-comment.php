<?php
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
include(SITE_ROOT.'model/Comment.php');
function loadCommentsById($id_sp, $start, $length){
	$comm = new Comment();
	$comm->setId($id_sp);
	$data = $comm->loadComments($start, $length);
	return $data;
}

function getSection($arr, $start, $total){
	return $data = array_slice($arr, $start, $total);
}

if((isset($_POST['start'])) && (isset($_POST['length'])) && (isset($_POST['id_sp']))){
	$start = $_POST['start'];
	$length = $_POST['length'];
	$id_sp = $_POST['id_sp'];
	
	$data = loadCommentsById($id_sp, $start, $length);
	
	$result = array();
		
	if($data == 'false'){
		$result['data'] = null;
	}
	else{
		$result['data'] = $data;
		$result['start'] = $start;
		$result['length'] = $length;
	}
	echo json_encode($result);
}

?>