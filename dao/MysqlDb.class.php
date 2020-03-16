<?php

class MySqlDb{
	private $mysqli;
	private static $mySqlDb;
	private $dbConfig = array(
			'host' => 'localhost',
			'port' => '3306',
			'user' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'dbname' => 'student_enrollment'
	);
	


	private function __construct(){

		$this->connectServer();
		$this->setCharSet();
		$this->selectDefaultDb();
	}

	private function connectServer(){
		
		$host = $this->dbConfig['host'];
		$port = $this->dbConfig['port'];
		$user = $this->dbConfig['user'];
		$password = $this->dbConfig['password'];
		
		$this->mysqli = new mysqli("$host:$port", $user, $password);
		if(mysqli_connect_errno()){
			die('connection filed！'.mysqli_connect_errno());
		}
	}

	private function setCharSet(){
		$sql = "set names {$this->dbConfig['charset']}";
		$this->query($sql);
	}

	private function selectDefaultDb(){
		if($this->dbConfig['dbname'] == ''){
			return;
		} else {
			$sql = "use `{$this->dbConfig['dbname']}`";
			$this->query($sql);
		}
	}
	

	public static function getMySqlDb(){
		if(!self::$mySqlDb instanceof self){
			self::$mySqlDb = new self();
		}
		return self::$mySqlDb;
	}

	private function __clone(){
		
	}

	public function query($sql){
		if($result = mysqli_query($this->mysqli, $sql)){
			return $result;
		} else {
			echo 'SQL：</br>';
			echo 'Wrong SQL：', $sql, '</br>';
			echo 'Wrong code：', mysqli_errno($this->mysqli), '</br>';
			echo 'Wrong info：', var_dump(mysqli_error_list($this->mysqli)),'</br>';
			die;
		}
	}

	public function fetchRow($sql){
		if($result = $this->query($sql)){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			mysqli_free_result($result);
			return $row;
		} else {
			return false;
		}
	}

	public function fetchAll($sql){
		if($result = $this->query($sql)){
			$rows = array();
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$rows[] = $row;
			}
			mysqli_free_result($result);
			return $rows;
		} else {
			return false;
		}
	}

	public function escapeString($data){
		return mysqli_real_escape_string($this->mysqli, $data);
	}
}

/* class test{
 public function show(){
 echo "I am test!";
 }
 } */
?>
