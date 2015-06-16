<?php
class registrasi{
//koneksi database dan nama table
private $connect;
private $table_name = "tbl_regstrasi";

//object properties
public $id_registrasi;
public $id_test;
public $nama;
public $jurusan;
public $tgl_registrasi;

public function __construct($db){
$this->conn = $db;	
	}
	
	 // ubah mahasiswa
	 // 
	 		function insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES(?,?,?,?)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_registrasi);
			$statement->bindParam(2, $this->id_test);
			$statement->bindParam(3, $this->jurusan);
			$statement->bindParam(4, $this->tgl_registrasi);

			if($statement->execute()) { return true; }
			else { return false; }
		}

   
		function update(){
			$query = "UPDATE " . $this->table_name . " SET id_registrasi = ? " . " " .
				"WHERE id_test = ? AND jurusan = ? AND tgl_registrasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(2, $this->id_test);
			$statement->bindParam(3, $this->jurusan);
			$statement->bindParam(4, $this->tgl_registrasi);
			$statement->bindParam(1, $this->id_registrasi);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE id_registrasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->hewan_kode);

			if($statement->execute()) { return true; }
			else { return false; }
		}


				/*function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE id_registrasi = ? AND id_test = ? AND kategori_id = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->bindParam(2, $this->hewan_kode);
			$statement->bindParam(3, $this->kategori_id);

			if($statement->execute()) { return true; }
			else { return false; }
		}*/


		function ShowAll(){
			if($this->id_test != null) {
				$query = "SELECT * FROM " . $this->table_name . " WHERE id_test = ? ORDER BY id_test ASC";
				$statement = $this->connect->prepare($query); 
				$statement->bindParam(1, $this->id_test);
				}
			else {
				$query = "SELECT * FROM " . $this->table_name . " ORDER BY id_test ASC";
				$statement = $this->connect->prepare($query); 
				}
				
			$statement->execute();
			return $statement;
		}

		function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_registrasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_registrasi);
			$statement->execute();
			
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->id_test = $row['id_test'];
				$this->nama = $row['nama'];
				$this->jurusan = $row['jurusan'];
				$this->tgl_registrasi = $row['tgl_registrasi'];
			}
			else
			{
				$this->id_test = "-";
				$this->nama = "-";
				$this->jurusan = "-";
				$this->tgl_registrasi = "-";
			}
		}

		function readAll($from_record_num, $records_per_page){	 
		    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_registrasi ASC LIMIT {$from_record_num}, {$records_per_page}";	 
		    $statement = $this->connect->prepare( $query );
		    $statement->execute();	 
		    return $statement;
		}

		public function countAll(){
		    $query = "SELECT 1 FROM " . $this->table_name;
		    $statement = $this->connect->prepare( $query );
		    $statement->execute();
		    $num = $statement->rowCount();
			return $num;
		}
		function ShowJurusan(){
			$query = "SELECT id_registrasi, jurusan FROM " . $this->table_name ." WHERE id_registrasi = ? ORDER BY id_registrasi ASC"; 
			$statement = $this->connect->prepare( $query );
			$statement->bindParam(1, $this->id_registrasi);
			$statement->execute();
			return $statement;
		}
}
?>