<?php
class Database{
// database credentials
private $host = "localhost";
private $db_name = "ta_feby";
private $username = "root";
private $password = "";
public $conn;

// fungsi untuk mengambil koneksi database
public function getConnection(){
$this->conn = null;
try{
$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);	
	}catch(PDOException $exception){
		echo "Tidak dapat terhubung ke database: " . $exception->getMessage();
		}
		return $this->conn;	
	}	
	}
?>
