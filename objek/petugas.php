<?php
	class petugas
	{
private $connect;
private $table_name = "tbl_petugas";
public $id_petugas, $nama_petugas, $password, $level;
public function __construct($db) { $this->connect = $db; }

		


		public function AutoNumber(){
			$auto = "A";
			$query = "SELECT id_petugas FROM tbl_petugas WHERE id_petugas LIKE '{$auto}%' ORDER BY id_petugas DESC LIMIT 1";
			$statement = $this->connect->prepare( $query );
			$statement->execute();
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$id = $row['id_petugas'];
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


		function Insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES(?,?,?,?)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->bindParam(2, $this->nama_petugas);
			$statement->bindParam(3, md5($this->password));
			$statement->bindParam(4, $this->level);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function ChangePass(){
			$query = "UPDATE " . $this->table_name . " SET password = ? WHERE (nama_petugas = ? or id_petugas= ?";
			$statement = $this->connect->prepare($query);
			$statement->bindParam(2, $this->nama_petugas); 
			$statement->bindParam(3, $this->id_petugas);
			$statement->bindParam(1, md5($this->password));

			if($statement->execute()) { return true; }
			else { return false; }
		}
		
		function Update(){
			$query = "UPDATE " . $this->table_name . " SET nama_petugas = ?, password=?, level =?".
			" WHERE id_petugas = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->nama_petugas);
			$statement->bindParam(2, $this->password);
			$statement->bindParam(3, md5($this->password));
			$statement->bindParam(4, $this->id_petugas);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE id_petugas = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function Show(){
			$query = "SELECT * FROM " . $this->table_name;
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->execute();
			return $statement;
		}
		
		function IsExist(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_petugas = ? ";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->execute();
			$num = $statement->rowCount();
			if($num>0)
				return true;
			else
				return false;
		}
		
		function UserType(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE nama_petugas=?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->nama_petugas);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($row['level'] == 1)
				return "YA";
			else
				return "BUKAN";
		}
		
		function LogIn(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE nama_petugas= ? and password=? ";
			$statement = $this->connect->prepare($query); 
			//$statement->bindParam(1, $this->id_petugas);
			$statement->bindParam(1, $this->nama_petugas);
			$statement->bindParam(2, md5($this->password));
			$statement->execute();
			$num = $statement->rowCount();
			if($num>0)
				return true;
			else
				return false;
		}
		
		function readAll($from_record_num, $records_per_page){	 
		    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_petugas ASC LIMIT {$from_record_num}, {$records_per_page}";	 
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
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_petugas = ?, nama_petugas=?, password=?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->bindParam(2, $this->nama_petugas);
			$statement->bindParam(3, $this->password);
			$statement->execute();
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->level = $row['level'];
			}
		}*/

		function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE id_petugas = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->execute();
			
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->nama_petugas = $row['nama_petugas'];
				$this->password = $row['password'];
				$this->level = $row['level'];
			}
			else
			{
				$this->nama_petugas = "-";
				$this->password = "-";
				$this->level = "-";
			}
		}


	}
?>