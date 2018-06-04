<?php
include_once('database.php');
class Category extends Database{
	public function __construct(){
		$this->connect();
	}
	
	public function listAllCate(){
		$sql = "SELECT ten_dm, id_dm FROM dmsanpham";
		$this->query($sql);
		while($row = $this->fetchData()){
			$ten_dm[] = $row;
		}
		return $ten_dm;
	}
	
	public function getCateName($id_dm){
		$sql = "SELECT ten_dm FROM dmsanpham WHERE id_dm = $id_dm";
		$this->query($sql);
		$data = $this->fetchData();
		return $data;
	}
}
?>