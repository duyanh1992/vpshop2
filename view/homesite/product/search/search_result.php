<?php
if(isset($_POST['sbutton'])){
	if(!empty($_POST['stext'])){
		$stext =  $_POST['stext'];
	}
}	
if(isset($_GET['stext'])){
	$stext = $_GET['stext'];
}

$stext =  trim($stext);

// prepare variables for paginating:
// if(isset($_GET['page'])){
	// $page = $_GET['page'];
// }
// else{
	// $page = 1;
// }
// $rowPerPage = 3;
// $start = ($page * $rowPerPage) - $rowPerPage;

// $arrStext = explode(' ',$stext);
// $stext = implode('%',$arrStext);
// $newStext = '%'.$stext.'%';

// $prd = new Product();
// $prd->searchPrd($newStext);
// $num_rows =  $prd->num_rows();

// if(isset($_GET['page_layout'])){
	// $page_layout = $_GET['page_layout'];
// }

// $totalPage = ceil($num_rows/$rowPerPage);

// $data = $prd->searchLimitPrd($newStext, $start, $rowPerPage);
// $listPage = $prd->paginateProduct($page_layout, $page, $totalPage, NULL, $totalPage, $stext);
?>
<div class="prd-block">
	<input type="hidden" name="sText" value="<?php if(isset($stext)) echo $stext; ?>" />
	<h2>kết quả tìm được với từ khóa <span class="skeyword" style="color:yellow;">"<?php echo $stext; ?>"</span></h2>
	<div class="pr-list">
		
	</div>
	<div class="clear"></div>
	<div id="pagination"> </div>
</div>