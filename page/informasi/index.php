<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	$status_home = null;
	$status_pendaftaran = null;
	$status_infrmasi="active";
	$status_hasil=null;
	$status_siswabaru=null;
	$status_login = null;
	
	//$_SESSION['login_setup'] = NULL;
	
	$page_title = "Pendaftaran";
	include $path . "/page/header.php";
	?>		<?php include $path . "/page/footer.php"
	?>