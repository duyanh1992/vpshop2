<?php
include_once('database.php');
class Product extends Database{
	public $product_id;
	public $product_name;
	public $product_image;
	public $product_category_id;
	public $product_price;
	public $product_warranty;
	public $product_attachment;
	public $product_situation;
	public $product_promotion;
	public $product_state;
	public $product_special;
	public $product_detail;
	
	
	public function __construct(){
		$this->connect();
	}
	
	public function setId($id){
		$this->product_id = $id;
	}
	public function getId(){
		return $this->product_id;
	}
	
	public function setName($name){
		$this->product_name = $name;
	}
	public function getName(){
		return $this->product_name;
	}
	
	public function setImage($image){
		$this->product_image = $image;
	}
	public function getImage(){
		return $this->product_image;
	}
	
	public function setCategory($category){
		$this->product_category_id = $category;
	}
	public function getCategory(){
		return $this->product_category_id;
	}
	
	public function setPrice($price){
		$this->product_price = $price;
	}
	public function getPrice(){
		return $this->product_price;
	}
	
	public function setWarranty($warranty){
		$this->product_warranty = $warranty;
	}
	public function getWarranty(){
		return $this->product_warranty;
	}
	
	public function setAttachment($attachment){
		$this->product_attachment = $attachment;
	}
	public function getAttachment(){
		return $this->product_attachment;
	}
	
	public function setSituation($situation){
		$this->product_situation = $situation;
	}
	public function getSituation(){
		return $this->product_situation;
	}
	
	public function setPromotion($promotion){
		$this->product_promotion = $promotion;
	}
	public function getPromotion(){
		return $product_promotion;
	}
	
	public function setState($state){
		$this->product_state = $state;
	}
	public function getState(){
		return $product_state;
	}
	
	public function setSpecial($special){
		$this->product_special = $special;
	}
	public function getSpecial(){
		return $product_special;
	}
	
	public function setDetail($detail){
		$this->product_detail = $detail;
	}
	public function getDetail(){
		return $product_detail;
	}
	
	public function listAllProduct(){
		$sql = "SELECT id_sp, ten_sp, gia_sp, ten_dm, anh_sp, bao_hanh, tinh_trang 
				FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm 
				ORDER BY id_sp DESC";
				
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		return $data;
	}
	
	public function listLimitProduct($start, $rowPerPage){
		$sql = "SELECT id_sp, ten_sp, gia_sp, ten_dm, anh_sp, tinh_trang, bao_hanh 
				FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm 
				ORDER BY id_sp DESC
				LIMIT $start, $rowPerPage";
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		return $data;
	}
	
	public function addProduct(){
		$sql = "INSERT INTO sanpham(id_dm, ten_sp, anh_sp, gia_sp, bao_hanh, phu_kien, 
									tinh_trang, khuyen_mai, trang_thai, dac_biet, 
									chi_tiet_sp)
				VALUES($this->product_category_id, '$this->product_name',
						'$this->product_image', $this->product_price, 
						'$this->product_warranty', '$this->product_attachment', 
						'$this->product_situation', '$this->product_promotion',
						'$this->product_state', $this->product_special, 
						'$this->product_detail')";
		$this->query($sql);		
	}
	
	public function getProductById($id_sp){
		$sql = "SELECT ten_sp, anh_sp, gia_sp, bao_hanh, tinh_trang, khuyen_mai, 
				trang_thai, dac_biet, chi_tiet_sp, phu_kien, sanpham.id_dm
				FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm
				WHERE id_sp = $id_sp";
		$this->query($sql);	
		$data = $this->fetchData();
		return $data;
	}
	
	public function editProduct(){
		if($this->checkEditPrdName()){
			$sql = "UPDATE sanpham
				SET id_dm = $this->product_category_id, ten_sp = '$this->product_name',
					anh_sp = '$this->product_image', gia_sp = $this->product_price, 
					bao_hanh = '$this->product_warranty', phu_kien = '$this->product_attachment', 
					tinh_trang = '$this->product_situation', khuyen_mai = '$this->product_promotion', 
					trang_thai = '$this->product_state', dac_biet = $this->product_special, 
					chi_tiet_sp = '$this->product_detail'
				WHERE id_sp = $this->product_id";
			$this->query($sql);
			return true;	
		}
		return false;
	}
	
	public function deleteProduct(){
		$sql = "DELETE FROM sanpham WHERE id_sp = $this->product_id";
		if($this->query($sql)){
			return true;
		}
		return false;
	}
	
	public function paginateProduct($page,$totalPage, $id_dm=NULL, $lastPage, $stext){
		$listPage = '';
		
		//The first page button:
		if($page > 1){
			$listPage .= '<a href="#" id="goFirst"><<</a> ';
		
		//The prev button:
			$pagePrev = $page-1;
			$listPage .= '<a href="#" id="prev">Prev</a> ';
		}
		
		// Page number:
		for($i=1;$i<=$totalPage;$i++){
			if($i == $page){
				$listPage .= "<a class='pgn' href='#' style='color:red; font-weight: bold;'>".$i."</a> ";
			}
			else{
				$listPage .= "<a href='#' class='pgn'>".$i."</a> ";
			}
		}
		
		// for($i=1;$i<=$totalPage;$i++){
			// if($i == $page){
				// $listPage .= "<a href='".$_SERVER['PHP_SELF']."?page_layout=".$pageLayout."&page=".$i."&id_dm=".$id_dm."&stext=".$stext."' style='color:red; font-weight: bold;'>".$i."</a> ";
			// }
			// else{
				// $listPage .= "<a href='".$_SERVER['PHP_SELF']."?page_layout=".$pageLayout."&page=".$i."&id_dm=".$id_dm."&stext=".$stext."'>".$i."</a> ";
			// }
		// }
		
		//The next button:
		if($page<$lastPage){
			$pageNext = $page+1;
			$listPage .= '<a href="#" id="next">Next</a> ';
			//<a href="">link</a>
		
		// The last page button:
			$listPage .= '<a href="#" id="goLast">>></a> ';
		}
		
		return $listPage;
	}
	
	public function getSpecialProduct(){
		$sql = "SELECT id_sp, ten_sp, bao_hanh, tinh_trang, gia_sp, anh_sp
				FROM sanpham WHERE dac_biet = 1
				LIMIT 6";
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		return $data;
	}
	
	public function listAllPrdByCateId($id_dm){
		$sql = "SELECT * 
				FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm
				WHERE dmsanpham.id_dm = $id_dm";
				
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}	
		if(isset($data)){
			return $data;
		}
	}
	
	public function listPrdByCateId($id_dm, $start, $rowPerPage){
		$sql = "SELECT * 
				FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm
				WHERE dmsanpham.id_dm = $id_dm
				LIMIT $start, $rowPerPage";
				
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}	
		if(isset($data)){
			return $data;
		}
	}
	
	public function searchPrd($stext){
		$sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '$stext'";
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		
		//return $data;
		if(!empty($data)){
			return $data;
		}
		else{
			return false;
		}
	}
	
	
	public function searchLimitPrd($stext,$start, $rowPerPage){
		$sql = "SELECT * FROM sanpham WHERE ten_sp LIKE '$stext'
				LIMIT $start, $rowPerPage";
		$this->query($sql);
		$this->num_rows();
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		return $data;
	}
	
	public function showPrdByStrId($str){
		$sql = "SELECT * FROM sanpham WHERE id_sp IN ($str)";
		if($this->query($sql)){
			while($row = $this->fetchdata()){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	public function checkAddPrdName(){
		$sql = "SELECT ten_sp FROM sanpham WHERE ten_sp = '$this->product_name'";
		$this->query($sql);
		if($this->num_rows() > 0 ){
			return false;
		}
		return true;
	}
	
	public function checkEditPrdName(){
		$sql = "SELECT ten_sp FROM sanpham WHERE ten_sp = '$this->product_name' AND id_sp != $this->product_id";
		$this->query($sql);
		if($this->num_rows() > 0 ){
			return false;
		}
		return true;
	}
}
?>