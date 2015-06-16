<?php
	if($_POST){
		include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/objects/hewan.php';
	    
		$database = new database();
		$db = $database->getConnection();
		$hewan = new hewan($db);
		$hewan->hewan_kode = $_POST['object_id'];	 
		if($hewan->delete()){ echo "Hewan berhasil dihapus."; }
		else {echo "Hewan tidak bisa dihapus."; }
	}
?>
