<?php
class pendaftaran{
//koneksi database dan nama table
private $connect;
private $table_name = "tbl_pendaftaran";

//object properties
public $id_pendaftaran, $tgl_pendaftaran, $jurusan, $NISN;
public function __construct($db) { 
			$this->connect = $db; 
		}
function Insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES (?,?,?,?)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_pendaftaran);
			$statement->bindParam(2, $this->tgl_pendaftaran);
			$statement->bindParam(3, $this->jurusan);
			$statement->bindParam(4, $this->NISN);

			if($statement->execute()) { return true; }
			else { 
				return false; }
		}

function Update(){
			$query = "UPDATE " . $this->table_name . " SET tgl_pendaftaran = ?, jurusan=?, NISN =?".
			" WHERE id_pendaftaran = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->tgl_pendaftaran);
			$statement->bindParam(2, $this->jurusan);
			$statement->bindParam(3, $this->NISN);
			$statement->bindParam(4, $this->id_pendaftaran);

			if($statement->execute()) { return true; }
			else { return false; }
		}

function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE id_pendaftaran = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_pendaftaran);

			if($statement->execute()) { return true; }
			else { return false; }
		}

function Show(){
			$query = "SELECT * FROM " . $this->table_name;
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_pendaftaran);
			$statement->execute();
			return $statement;
		}

		function readAll($from_record_num, $records_per_page){	 
		    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_pendaftaran ASC LIMIT {$from_record_num}, {$records_per_page}";	 
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

		function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_pendaftaran = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_pendaftaran);
			$statement->execute();
			
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->tgl_pendaftaran = $row['tgl_pendaftaran'];
				$this->jurusan = $row['jurusan'];
				$this->NISN = $row['NISN'];
			}
			else
			{
				$this->tgl_pendaftaran = "-";
				$this->jurusan = "-";
				$this->NISN = "-";
			}
		}

}

?>
