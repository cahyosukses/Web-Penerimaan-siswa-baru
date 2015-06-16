<?php 
	session_start();
	
	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/database.php'; 
	$database = new database();
	$db = $database->getConnection();
	
	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$users  = new petugas($db);

	if($_POST) {
		$users->nama_petugas = $_POST['nama_petugas'];
		$users->id_petugas = $_POST['id_petugas']
		$users->password = $_POST['password'];
		
		if($users->LogIn())
		{
			$_SESSION['login_user'] = $_POST['id_petugas','nama_petugas'];
			$_SESSION['login_setup'] = false;
			header('location:/');
		}
		else {
			header('location:/page/failed.php');
		}
	}
?>