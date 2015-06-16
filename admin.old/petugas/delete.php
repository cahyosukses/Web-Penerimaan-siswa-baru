<?php
	if($_POST){
		include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	    
		$database = new database();
		$db = $database->getConnection();
		$users = new petugas($db);
		$users->id_petugas = $_POST['object_id'];	 
		if($users->delete()){ echo "User berhasil dihapus."; }
		else {echo "User tidak bisa dihapus."; }
	}
?>
