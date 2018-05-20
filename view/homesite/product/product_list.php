<?php
if(isset($_GET['id_dm'])){
	$id_dm = $_GET['id_dm'];
	echo '<input type="hidden" id="id_dm" value="'.$id_dm.'" />';
	if(isset($_GET['page_layout'])){
		$page_layout = $_GET['page_layout'];
	}
	
	// prepare variables for paginating:
	// if(isset($_GET['page'])){
		// $page = $_GET['page'];
	// }
	// else{
		// $page = 1;
	// }
	//$rowPerPage = 3;
	//$start = ($page * $rowPerPage) - $rowPerPage;
	
	
	 //$prd = new Product();
	 //$prd->listAllPrdByCateId($id_dm);
	// $num_rows =  $prd->num_rows();
	
	// $totalPage = ceil($num_rows/$rowPerPage);
	
	//Get prd list:
	// $data = $prd->listPrdByCateId($id_dm, $start, $rowPerPage);
	
	// $listPage = $prd->paginateProduct($page_layout, $page, $totalPage, $id_dm, $totalPage, NULL);
	
	//Get cate name by id_dm:
	$cate = new Category();
	$cateName = $cate->getCateName($id_dm);
	
	
}
?>
<div class="prd-block">
	<h2><?php echo $cateName['ten_dm'] ?></h2>
	<div class="pr-list">
		
	</div>
</div>       
<div class="clear"></div>
<div id="pagination"></div>
       