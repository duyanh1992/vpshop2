<?php
class Database{
	public $dbHost = 'localhost';
	public $dbUser = 'root';
	public $dbPass = '';
	public $dbName = 'vietproshop';
	public $con;
	public $query;
	
	
	public function connect(){
		$this->con = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
		if($this->con){
			mysqli_set_charset($this->con, 'utf8');
			return true;
		}
		return false;
	}
	
	public function query($sql){
		if($this->connect()){
			$this->query = mysqli_query($this->con, $sql);
			if($this->query) return true;
		}
		return false;
	}
	
	public function num_rows(){
		if($this->query){
			$row = mysqli_num_rows($this->query);
		}
		else{
			$row = 0;
		}
		return $row;
	}
	
	public function fetchData(){
		if($this->num_rows()>0){
			$data = mysqli_fetch_assoc($this->query);
		}
		else{
			$data = 0;
		}
		return $data;
	}
}
?>