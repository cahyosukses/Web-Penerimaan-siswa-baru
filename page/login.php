<?php 
	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
	$database = new database();
	$db = $database->getConnection();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$users  = new petugas($db);						            
		if($_POST) {
		$users->nama_petugas = $_POST['nama_petugas'];
		$users->password = $_POST['password'];
		
		if($users->LogIn())
		{
			if($users->UserType() == "YA")
			{
				$_SESSION['login_user'] = $_POST['nama_petugas'];
				$_SESSION['admin'] = true;
				header('location:/admin/home.php');
			}
			else
			{
				header('location:/admin/error.php');
			}
		}
	
else {
			header('location:/admin/failed.php');
		}
	}
?>