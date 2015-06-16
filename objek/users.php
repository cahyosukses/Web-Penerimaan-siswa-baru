<?php
	class users
	{
		private $connect;
		private $table_name = "tbuser";
	 
		public $email, $password, $isadmin;

		public function __construct($db) { $this->connect = $db; }

		function Insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES(?,?,0)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->bindParam(2, md5($this->password));

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function ChangePass(){
			$query = "UPDATE " . $this->table_name . " SET password = ? WHERE email = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(2, $this->email);
			$statement->bindParam(1, $this->md5(password));

			if($statement->execute()) { return true; }
			else { return false; }
		}
		
		function Update(){
			$query = "UPDATE " . $this->table_name . " SET isadmin = ? WHERE email = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->isadmin);
			$statement->bindParam(2, $this->email);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE email = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);

			if($statement->execute()) { return true; }
			else { return false; }
		}

		function Show(){
			$query = "SELECT * FROM " . $this->table_name;
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->execute();

			return $statement;
		}
		
		function IsExist(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE email = ? ";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->execute();
			$num = $statement->rowCount();
			if($num>0)
				return true;
			else
				return false;
		}
		
		function UserType(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			if($row['isadmin'] == 1)
				return "YA";
			else
				return "BUKAN";
		}
		
		function LogIn(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE email=? AND password=? ";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->bindParam(2, md5($this->password));
			$statement->execute();
			$num = $statement->rowCount();
			if($num>0)
				return true;
			else
				return false;
		}
		
		function readAll($from_record_num, $records_per_page){	 
		    $query = "SELECT * FROM " . $this->table_name . " ORDER BY email ASC LIMIT {$from_record_num}, {$records_per_page}";	 
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
			$query = "SELECT * FROM " . $this->table_name . " WHERE email = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->email);
			$statement->execute();
			
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			if($num > 0)
			{
				$this->isadmin = $row['isadmin'];
			}
		}

	}
?>
