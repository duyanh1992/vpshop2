<?php
include_once('database.php');
class Comment extends Database{
	public $id_bl;
	public $id_sp;
	public $name;
	public $phone;
	public $content;
	public $comment_date;
	
	public function __construct(){
		
	}
	
	public function setId($id){
		$this->id_sp = $id;
	}
	
	public function setParams($name, $phone, $content, $comment_date){
		$this->name = $name;
		$this->phone = $phone;
		$this->content = $content;
		$this->comment_date = $comment_date;
	}
	
	public function loadComments($start, $length){
		$sql = "SELECT ten, ngay_gio, binh_luan 
				FROM blsanpham 
				WHERE id_sp = '$this->id_sp'
				LIMIT $start, $length";
		$this->query($sql);
		while($row = $this->fetchData()){
			$data[] = $row;
		}
		if(!empty($data)){
			return $data;
		}
		return false;
	}
	
	public function postComment($id_sp){
		$sql = "INSERT INTO blsanpham(id_sp, ten, dien_thoai, binh_luan, ngay_gio)
				VALUES($id_sp,'$this->name','$this->phone', '$this->content', '$this->comment_date')";
		return $this->query($sql);		
	}
}
?>