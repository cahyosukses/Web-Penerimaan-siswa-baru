<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	$status_home = null;
	$status_pendaftaran = null;
	$status_infrmasi=null;
	$status_hasil=null;
	$status_siswabaru="active";
	$status_login = null;
	
	//$_SESSION['login_setup'] = NULL;
	
	$page_title = "LogIn";
	include $path . "/page/header.php";
	include_once 'login.php';

		
	?>

	<?php include $path . "/page/footer.php"
	?>