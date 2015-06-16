<?php
	class informasi	{
		private $connect;
		private $table_name = "tbl_informasi";
		public $id_informasi, $judul, $deskripsi, $id_petugas;
		public function __construct($db) { 
			$this->connect = $db; 
		}


		function Insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES (?,?,?,?)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, stripslashes($this->id_informasi));
			$statement->bindParam(2, stripslashes($this->judul));
			$statement->bindParam(3, stripslashes($this->deskripsi));
			$statement->bindParam(4, stripslashes($this->id_petugas));

			if($statement->execute()) { return true; }
			else { 
				return false; }
		}

		
		function Update(){
			$query = "UPDATE " . $this->table_name . " SET judul = ?, deskripsi=?, id_petugas =?".
			" WHERE id_informasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, stripslashes($this->judul));
			$statement->bindParam(2, stripslashes($this->deskripsi));
			$statement->bindParam(3, stripslashes($this->id_petugas));
			$statement->bindParam(4, stripslashes($this->id_informasi));

			if($statement->execute()) { return true; }
			else { return false; }
		}
 	 function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE id_informasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_informasi);

			if($statement->execute()) { return true; }
			else { return false; }
		}


		function Show(){
			$query = "SELECT * FROM " . $this->table_name;
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_informasi);
			$statement->execute();
			return $statement;
		}
		
		function readAll($from_record_num, $records_per_page){	 
		    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_informasi ASC LIMIT {$from_record_num}, {$records_per_page}";	 
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

		/*function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_informasi = ?, judul=?, deskripsi=?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_informasi);
			$statement->bindParam(2, $this->judul);
			$statement->bindParam(3, $this->deskripsi);
			$statement->execute();
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->id_petugas = $row['id_petugas'];
			}
		}*/
		function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_informasi = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_informasi);
			$statement->execute();
			
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->judul = $row['judul'];
				$this->deskripsi = $row['deskripsi'];
				$this->id_petugas = $row['id_petugas'];
			}
			else
			{
				$this->judul = "-";
				$this->deskripsi = "-";
				$this->id_petugas = "-";
			}
		}

		public function AutoNumber(){
			$auto = "INFO-" ;
			$query = "SELECT id_informasi FROM tbl_informasi WHERE id_informasi LIKE '{$auto}%' ORDER BY id_informasi DESC LIMIT 1";
			$statement = $this->connect->prepare( $query );
			$statement->execute();
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$id = $row['id_informasi'];
			if($num == 0)
				$id = $auto . "0001";
			else
				{
					$x = intval(substr($id, -3)) + 1;
					switch(strlen($x))
					{
						case 1:
							$id = $auto . "000" . $x;
							break;
						case 2:
							$id = $auto . "00" . $x;
							break;
						case 3:
							$id = $auto . "0" . $x;
						case 4:
							$id = $auto . $x;
						break;
					}
				}

			return $id;
		}
}

?>