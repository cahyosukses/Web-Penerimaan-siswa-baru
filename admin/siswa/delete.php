<?php
	if($_POST){
		include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/calonsiswa.php';
	    
		$database = new database();
		$db = $database->getConnection();
		$users = new calonpeserta($db);
		$users->nisn = $_POST['object_id'];	

		if($users->delete()){ echo "Data berhasil dihapus."; }

		else 
			{echo "Data tidak bisa dihapus."; }
	}
?>
