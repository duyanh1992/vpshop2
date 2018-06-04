<?php
include_once('database.php');
class User extends Database{
	public $user_id;
	public $tai_khoan;
	public $mat_khau;
	public $email;
	public $quyen_truy_cap;
	
	public function __construct(){
		$this->connect();
	}
	
	public function setUserId($userId){
		$this->user_id = $userId;
	}

	public function getUserId(){
		return $this->user_id;
	}
	
	public function setUserName($userName){
		$this->tai_khoan = $userName;
	}

	public function getUserName(){
		return $this->tai_khoan;
	}
	
	public function setUserPass($userPass){
		$this->mat_khau = $userPass;
	}

	public function getUserPass(){
		return $this->mat_khau;
	}
	
	public function setEmail($userEmail){
		$this->email = $userEmail;
	}

	public function getUserEmail(){
		return $this->email;
	}
	
	public function checkLogin(){
		$sql = "SELECT * FROM thanhvien WHERE tai_khoan = '".$this->getUserName()."' AND mat_khau = '".$this->getUserPass()."' AND quyen_truy_cap = 2";
		$this->query($sql);
		if($this->num_rows() > 0){
			return true;
		}
		return false;
	}
	
	public function signUp(){
		$sql = "INSERT INTO thanhvien(tai_khoan, mat_khau, quyen_truy_cap, email)
				VALUES('$this->tai_khoan', '$this->mat_khau', 1, '$this->email')";
		return $this->query($sql);
	}
	
	public function checkName(){
		$sql = "SELECT id_thanhvien FROM thanhvien WHERE tai_khoan = '$this->tai_khoan'";
		$this->query($sql);
		return $this->num_rows($sql);
	}
	
	public function checkUserLogin(){
		$sql = "SELECT * FROM thanhvien WHERE tai_khoan = '".$this->getUserName()."' AND mat_khau = '".$this->getUserPass()."'";
		$this->query($sql);
		if($this->num_rows() > 0){
			return true;
		}
		return false;
	}
	
	public function logout(){
		// if(isset($_SESSION['username'])){
			// unset($_SESSION['username']);
			// return true;
		// }
		// if(isset($_SESSION['token'])){
			session_destroy();
			return true;
		// }
		// return false;
	}
}
?>