<?php
class hasiltest{

private $connect;
private $table_name = "tbl_hasiltest";
public $id_test, $id_pendaftaran, $hasil, $id_petugas;
public function __construct($db) { $this->connect = $db; }

			function Insert(){
				$query = "INSERT INTO  " . $this->table_name . " VALUES(?,?,?,?) ";
				$statement = $this->connect->prepare($query);
				$statement->bindParam(1, $this->id_test);
				$statement->bindParam(2, $this->id_pendaftaran);
				$statement->bindParam(3, $this->hasil);
				$statement->bindParam(4, $this->id_petugas);
				//$statement->bindParam(5, $this->keterangan);

				if($statement->execute()) { return true; 
				}else { 
						return false; 
					}
				} 
// ubah Data Hasil Test
   		 function update(){
         $query = "UPDATE " . $this->table_name . " SET id_pendaftaran= ?, hasil= ?, id_petugas= ?"." WHERE id_test=?";
        $statement = $this->connect->prepare($query);
        $statement->bindParam(1, $this->id_pendaftaran);
        $statement->bindParam(2, $this->hasil);
        $statement->bindParam(3, $this->id_petugas);
        //$statement->bindParam(4, $this->nohp);
        //$statement->bindParam(5, $this->email);
        //$statement->bindParam(6, $this->jadwal);        
        $statement->bindParam(4, $this->id_test);        
        if($statement->execute()){
            return true;
        	}else{
            	return false;
    		}
 	
    	}
 	 
 	 // hapus data 
 	 function delete(){
	    $query = "DELETE FROM " . $this->table_name . " WHERE id_test= ?";	 
	    $statement = $this->connect->prepare($query);
	    $statement->bindParam(1, $this->id_pendaftaran);	 
	    if($result = $statement->execute()){
	        return true;
	    }else{
	        return false;
	    }
	 }
 	 
function readAll($from_record_num, $records_per_page){	 
	    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_test ASC LIMIT {$from_record_num}, {$records_per_page}";	 
	    $statement = $this->connect->prepare( $query );
	    $statement->execute();	 
	    return $statement;
	 } 	 
 	 
// digunakan untuk paging
function getAll(){	 
	    $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_test ASC";	 
	    $statement = $this->connect->prepare( $query );
	    $statement->execute();	 
	    return $statement;


	 }
	public function countAll(){
	 
	    $query = "SELECT 1 FROM " . $this->table_name . "";
	 
	    $statement = $this->connect->prepare( $query );
	    $statement->execute();
	    $num = $statement->rowCount();
	    return $num;
	}
	
	// digunakan untuk paging
	public function readOne(){
	 
	    $query = "SELECT * FROM " . $this->table_name . " where id_test=? LIMIT 0,1";
	    $statement = $this->connect->prepare( $query );
       	$statement->bindParam(1, $this->id_test);	 	    
	    $statement->execute();	 
		$row = $statement->fetch(PDO::FETCH_ASSOC);
 
	    $this->id_test = $row['id_test'];
	    $this->id_pendaftaran = $row['id_pendaftaran'];
	    $this->hasil = $row['hasil'];
	    $this->id_petugas = $row['id_petugas'];
	}

	public function AutoNumber(){
			$auto = date("dm");
			$query = "SELECT id_test FROM tbl_hasiltest WHERE id_test LIKE '{$auto}%' ORDER BY id_test DESC LIMIT 1";
			$statement = $this->connect->prepare( $query );
			$statement->execute();
			$num = $statement->rowCount();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			$id = $row['id_test'];
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

		}	   

		function readNama(){
			$query = "SELECT hasil FROM " . $this->table_name . " WHERE id_pendaftaran = ? limit 0,1";
			$statement = $this->connect->prepare( $query );
			$statement->bindParam(1, $this->id_pendaftaran);
			$statement->execute();
			
			$row = $statement->fetch(PDO::FETCH_ASSOC);		
			$this->hasil = $row['hasil'];
			
			} 

// digunakan oleh select drop-down list
    function read(){
        //select semua data
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_pendaftaran"; 
        $statement = $this->connect->prepare( $query );
        $statement->execute();
        return $statement;
    	}	

	public function webawal(){

			$query="SELECT A.NISN, A.nama, B.jurusan, A.hasil from tbl_hasiltest A, tbl_registrasi B where A.nama=B.Nama
				";
			$statement = $this->connect->prepare( $query ); 
			$statement->bindParam(1, $this->NISN);
			$statement->execute();

			return $statement;
		}
		public function report(){

			$query="SELECT A.NISN, A.nama, B.jurusan, A.hasil from tbl_hasiltest A, tbl_registrasi B where A.nama=B.Nama
				";
			$statement = $this->connect->prepare( $query ); 
			$statement->bindParam(1, $this->NISN);
			$num = $statement->rowCount();
			$statement->execute();

			return $statement;
		}

		function id_petugas(){
			$query="SELECT A.id_petugas, B.id_petugas from tbl_hasiltest A, tbl_petugas B where A.id_petugas = B.nama
				";
			$statement = $this->connect->prepare( $query ); 
			$statement->bindParam(1, $this->id_petugas);
			$statement->execute();

			return $statement;
		}

			
}?>