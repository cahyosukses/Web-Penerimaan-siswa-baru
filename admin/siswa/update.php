<?php
	session_start();
	$cetak=($_SESSION['login_user']);

	if (!$_SESSION['admin']){
		header("location:/admin/failed.php");
	}
	
	$path = $_SERVER['DOCUMENT_ROOT'];
	if($_SESSION['login_user'] != null) {
	
	include_once $path . '/config/database.php';

	$database = new database();
	$db = $database->getConnection();		

	$page_title = "Edit Petugas";
	include_once $path . '/admin/header.php';
	include_once $path . '/objek/calonsiswa.php';
	
	$kode = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Kode Error.');
	
	$users = new calonpeserta($db);
	$users->NISN = $kode;	 
	$users->ShowOne();
	
	echo "<div class='container'>";
		if($_POST){
			include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/calonsiswa.php';
			$users  = new calonpeserta($db);
			$users->id_petugas = $_POST['id_petugas'];
			$users->nama_petugas = $_POST['nama_petugas'];
			$users->password = $_POST['password'];
			$users->level = $_POST['usertype'];
			if($users->Update()){
				echo "<div class='alert alert-success alert-dismissable'>";
				echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
				echo "Data berhasil diubah.";
				echo "</div>";
			}
			else {
				echo "<div class='alert alert-danger alert-dismissable'>";
				echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
				echo "Data gagal diubah.";
				echo "</div>";
			}
		}

		echo "<div class='row'>";
		echo "<form id='form_reg' class='form-horizontal' action='' method='POST' role='form'>";
		echo "<legend class='text-center'>Ubah Data Petugas</legend>";
		echo "<div class='form-group'>";
		echo "  <label for='email' class='col-sm-3 control-label'>ID Petugas</label>";
		echo "  <div class='col-sm-7'>";
		echo "	<input type='text' class='form-control' name='id_petugas' value='{$users->id_petugas}' readonly>";
		echo "  </div>";
		echo "</div>";

		echo "<div class='form-group'>";
		echo "  <label for='email' class='col-sm-3 control-label'>Nama Petugas</label>";
		echo "  <div class='col-sm-7'>";
		echo "	<input type='text' class='form-control' name='nama_petugas' value='{$users->nama_petugas}'>";
		echo "  </div>";
		echo "</div>";


		echo "<div class='form-group'>";
		echo "  <label for='email' class='col-sm-3 control-label'>Password</label>";
		echo "  <div class='col-sm-7'>";
		echo "	<input type='text' class='form-control' name='password' value='{$users->password}'>";
		echo "  </div>";
		echo "</div>";

		echo "<div class='form-group'>";
		echo "  <label for='usertype' class='col-sm-3 control-label'>Level</label>";
		echo "  <div class='col-sm-7'>";
		echo "	<select class='form-control' id='usertype' name='usertype' placeholder='Level' required>";
			if($users->level > 0) {
				$rdoadmin = 'selected';
				$rdouser = null;
			}
			else {
				$rdoadmin = null;
				$rdouser = 'selected';
			}
		echo "<option value = 1 {$rdoadmin}>ADMINISTRATOR</option>";
		echo "<option value = 0 {$rdouser}>USER</option>";
		echo "</select>";
		echo "  </div>";
		echo "</div>";
		echo "<div class='form-group'>";
		echo "  <div class='col-sm-3'></div>";
		echo "  <div class='col-sm-7'>";
		echo "<button type='submit' class='btn btn-primary col-sm-2'>Simpan</button>";
		echo "<a href='/admin/petugas/' class='btn btn-warning col-sm-2' style='margin-left:10px; padding-left:10px;'>Batal</a>";
		echo "  </div>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
		include_once $path . '/admin/footer.php';
		echo "</div>";
	}
	else {
		header("location:/admin/error.php");
	}
?>