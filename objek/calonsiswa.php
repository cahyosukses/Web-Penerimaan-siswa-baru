<?php
class calonpeserta{
//koneksi database dan nama table
private $connect;
private $table_name = "tbl_calonpeserta";

public $nisn;
public $nama;
public $jenis_kelamin;
public $tempat_lahir; 
public $tgl_lahir;
public $agama;
public $kewarganegaraan;
public $anak_ke;
public $jumlah_saudara;
public $alamat_lengkap;
public $nomer_tlp;
public $tinggaldengan;
public $gol_darah;
public $asal_sekolah;
public $tahun_lulus;
public $kota;
public $kabupaten;

public $nama_bapak;
public $nama_ibu;
public $nama_wali;
public $umur_bapak;
public $umur_ibu;
public $umur_wali;

public $agama_bapak;
public $agama_ibu;
public $agama_wali;
public $pendidikan_bapak;
public $pendidikan_ibu;
public $pendidikan_wali;
public $pekerjaan_bapak;

public $pekerjaan_ibu;
public $pekerjaan_wali;
public $alamat_bapak;
public $alamat_ibu;
public $alamat_wali;
public $tlp_bapak;
public $tlp_ibu;
public $tlp_wali;
public $hp_bapak;
public $hp_ibu;
public $hp_wali;

public function __construct($db) { $this->connect = $db; }
//public function __construct($db) { $this->connect = $db; }
//fungsi insert
		function Insert(){
			$query = "INSERT INTO  " . $this->table_name . "  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->nisn);
			$statement->bindParam(2, $this->nama);
			$statement->bindParam(3, $this->jenis_kelamin);
			$statement->bindParam(4, $this->tempat_lahir);
			$statement->bindParam(5, $this->tgl_lahir);
			$statement->bindParam(6, $this->agama);
			$statement->bindParam(7, $this->kewarganegaraan);
			$statement->bindParam(8, $this->anak_ke);
			$statement->bindParam(9, $this->jumlah_saudara);
			$statement->bindParam(10, $this->alamat_lengkap);
			$statement->bindParam(11, $this->nomer_tlp);
			$statement->bindParam(12, $this->tinggaldengan);
			$statement->bindParam(13, $this->gol_darah);
			$statement->bindParam(14, $this->asal_sekolah);
			$statement->bindParam(15, $this->tahun_lulus);
			$statement->bindParam(16, $this->kota);
			$statement->bindParam(17, $this->kabupaten);
			$statement->bindParam(18, $this->nama_bapak);
			$statement->bindParam(19, $this->nama_ibu);
			$statement->bindParam(20, $this->nama_wali);
			$statement->bindParam(21, $this->umur_bapak);
			$statement->bindParam(22, $this->umur_ibu);
			$statement->bindParam(23, $this->umur_wali);
			$statement->bindParam(24, $this->agama_bapak);
			$statement->bindParam(25, $this->agama_ibu);
			$statement->bindParam(26, $this->agama_wali);
			$statement->bindParam(27, $this->pendidikan_bapak);
			$statement->bindParam(28, $this->pendidikan_ibu);
			$statement->bindParam(29, $this->pendidikan_wali);
			$statement->bindParam(30, $this->pekerjaan_bapak);
			$statement->bindParam(31, $this->pekerjaan_ibu);
			$statement->bindParam(32, $this->pekerjaan_wali);
			$statement->bindParam(33, $this->alamat_bapak);
			$statement->bindParam(34, $this->alamat_ibu);
			$statement->bindParam(35, $this->alamat_wali);
			$statement->bindParam(36, $this->tlp_bapak);
			$statement->bindParam(37, $this->tlp_ibu);
			$statement->bindParam(38, $this->tlp_wali);
			$statement->bindParam(39, $this->hp_bapak);
			$statement->bindParam(40, $this->hp_ibu);
			$statement->bindParam(41, $this->hp_wali);

			//$statement->bindParam(42, $this->tempat_lahir);

			if($statement->execute()) { return true; }
			else { return false; }
		}


 	 
// ubah siswa
    function update(){
         $query = "UPDATE " . $this->table_name . " SET nisn= ?, nama = ?, jenis_kelamin=?, tempat_lahir=?, 
 tgl_lahir=?, agama=?, kewarganegaraan=?, anak_ke=?, jumlah_saudara=?, alamat_lengkap= ?,
 nomer_tlp=?, tinggaldengan=?, gol_darah=?, asal_sekolah=?, tahun_lulus=?, kota= ?, kabupaten= ?, nama_bapak=?, 
 nama_ibu=?, nama_wali=?, umur_bapak=?, umur_ibu=?, umur_wali=?, agama_bapak= ?, agama_ibu= ?, agama_wali=?, 
 pendidikan_bapak=?, pendidikan_ibu=?, pendidikan_wali=?, pekerjaan_bapak=?, pekerjaan_ibu= ?, pekerjaan_wali=?, 
 alamat_bapak= ?, alamat_ibu= ?,alamat_wali= ?, tlp_bapak= ?, tlp_ibu= ?, tlp_wali= ?, hp_bapak= ?, hp_ibu=?, hp_wali=? ";
 
        $statement = $this->connect->prepare($query);
 		//$statement->bindParam(1, $this->NISN);
		$statement->bindParam(1, $this->nama);
		$statement->bindParam(2, $this->jenis_kelamin);
		$statement->bindParam(3, $this->tempat_lahir);
		$statement->bindParam(4, $this->tgl_lahir);
		$statement->bindParam(5, $this->agama);
		$statement->bindParam(6, $this->kewarganegaraan);
		$statement->bindParam(7, $this->anak_ke);
		$statement->bindParam(8, $this->jumlah_saudara);
		$statement->bindParam(9, $this->alamat_lengkap);
		$statement->bindParam(10, $this->nomer_tlp);
		$statement->bindParam(11, $this->tinggaldengan);
		$statement->bindParam(12, $this->gol_darah);
		$statement->bindParam(13, $this->asal_sekolah);
		$statement->bindParam(14, $this->tahun_lulus);
		$statement->bindParam(15, $this->kota);
		$statement->bindParam(16, $this->kabupaten);
		$statement->bindParam(17, $this->nama_bapak);
		$statement->bindParam(18, $this->nama_ibu);
		$statement->bindParam(19, $this->nama_wali);
		$statement->bindParam(20, $this->umur_bapak);
		$statement->bindParam(21, $this->umur_ibu);
		$statement->bindParam(22, $this->umur_wali);
		$statement->bindParam(23, $this->agama_bapak);
		$statement->bindParam(24, $this->agama_ibu);
		$statement->bindParam(25, $this->agama_wali);
		$statement->bindParam(26, $this->pendidikan_bapak);
		$statement->bindParam(27, $this->pendidikan_ibu);
		$statement->bindParam(28, $this->pendidikan_wali);
		$statement->bindParam(29, $this->pekerjaan_bapak);
		$statement->bindParam(30, $this->pekerjaan_ibu);
		$statement->bindParam(31, $this->pekerjaan_wali);
		$statement->bindParam(32, $this->alamat_bapak);
		$statement->bindParam(33, $this->alamat_ibu);
		$statement->bindParam(34, $this->alamat_wali);
		$statement->bindParam(35, $this->tlp_bapak);
		$statement->bindParam(36, $this->tlp_ibu);
		$statement->bindParam(37, $this->tlp_wali);
		$statement->bindParam(38, $this->hp_bapak);
		$statement->bindParam(39, $this->hp_ibu);
		$statement->bindParam(40, $this->hp_wali);
			//$statement->bindParam(42, $this->tempat_lahir);

			if($statement->execute()) { return true; }
			else { return false; }
		}

    
 	 
 	 // hapus data mahasiswa
	 function Delete(){
			$query = "DELETE FROM " . $this->table_name ."  WHERE nisn = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->nisn);

			if($statement->execute()) { return true; }
			else { return false; }
		}


 	 function readAll($from_record_num, $records_per_page){	 
	    $query = "SELECT * FROM " . $this->table_name . " ORDER BY nisn ASC LIMIT {$from_record_num}, {$records_per_page}";	 
	    $statement = $this->connect->prepare( $query );
	    $statement->execute();	 
	    return $statement;
	 	}
// digunakan untuk paging
// 

	public function countAll(){
		    $query = "SELECT 1 FROM " . $this->table_name;
		    $statement = $this->connect->prepare( $query );
		    $statement->execute();
		    $num = $statement->rowCount();
			return $num;
			}

	function ShowOne(){
			$query = "SELECT * FROM " . $this->table_name . " WHERE nisn = ?";
			$statement = $this->connect->prepare($query); 
			$statement->bindParam(1, $this->nisn);
			$statement->execute();
			$row = $statement->fetch(PDO::FETCH_ASSOC);
			
			$num = $statement->rowCount();
			/*if($num > 0)
			{
				$this->nama_depan = $row['nama_depan'];
				$this->nama_belakang = $row['nama_belakang'];
				$this->jenis_kelamin = $row['jenis_kelamin'];
				$this->alamat = $row['alamat'];
				$this->kota = $row['kota'];
				$this->kode_pos = $row['kode_pos'];
				$this->provinsi = $row['provinsi'];
				$this->nohp = $row['nohp'];
			}
			else
			{
				$this->nama_depan = null;
				$this->nama_belakang = null;
				$this->jenis_kelamin = null;
				$this->alamat = null;
				$this->kota = null;
				$this->kode_pos = null;
				$this->provinsi = null;
				$this->nohp = null;
			}*/
		}

	// digunakan untuk paging
	public function readOne(){
	 
	    $query = "SELECT * FROM " . $this->table_name . " where nisn=? LIMIT 0,1";
	    $stmt = $this->conn->prepare( $query );
       $stmt->bindParam(1, $this->id);	 	    
	    $stmt->execute();	 
		 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
	    $this->id_pendaftaran = $row['id_pendaftaran'];
	    $this->tgl_pendaftaran = $row['tgl_pendaftaran'];
	    $this->jurusan = $row['jurusan'];
	    $this->NISN = $row['NISN'];
	   // $this->email = $row['email'];
	    //$this->jadwal = $row['jadwal'];
	}	   

/*function readNama(){
		$query = "SELECT jurusan FROM " . $this->table_name . " WHERE id_pendaftaran = ? limit 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);		
		$this->jurusan = $row['jurusan'];
		
	} 
*/
// digunakan oleh select drop-down list
    function read(){
        //select semua data
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_pendaftaran"; 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        return $stmt;
    }	


}

?>
