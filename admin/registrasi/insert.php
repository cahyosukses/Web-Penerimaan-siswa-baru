<?php
	session_start();

	$cetak=($_SESSION['login_user']);
	
	if (!$_SESSION['admin']){
		header("location:/admin/failed.php");
	}
	
	$path = $_SERVER['DOCUMENT_ROOT'];

	include_once $path . '/config/database.php';

	$database = new database();
	$db = $database->getConnection();		

	$page_title = "Tambah Data Test";

	include_once $path . '/admin/header.php';
	include_once $path . '/objek/hasiltest.php';
	
	$users = new hasiltest($db);

	echo "<div class='container'>";

	if($_POST){	 
	    $users->id_test = $_POST['id_test'];	    
	    $users->id_pendaftaran = $_POST['id_pendaftaran'];
	    $users->hasil = $_POST['hasil'];	    
	    $users->id_petugas = $_POST['id_petugas'];
	    //$users->harga = $_POST['harga'];	    
	    //$users->detail = $_POST['detail'];
		
		//$target_dir = "/images/";
/*		$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		$check = getimagesize($_FILES["myimage"]["tmp_name"]);
		
		if($check !== false)
			echo "File is an image - " . $check["mime"] . "."; 
		else
			echo "File is not an image.";	
*/	    
	    if($users->Insert()){
	        echo "<div class='alert alert-success alert-dismissable'>";
	            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	            echo "Data berhasil ditambahkan.";
	        echo "</div>";
	    }

	    else {
	        echo "<div class='alert alert-danger alert-dismissable'>";
	            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	            echo "Gagal menambahkan Data";
	        echo "</div>";
	    }
	}	
	
?>
	<div class='page-header'>
	<h2>Tambah Data Hasil Test</h2>
	</div>
	<div class='row'>
		<form action='insert.php' method='post' class='form-horizontal' role='form'>

				<div class="form-group">
				<label class="control-label col-sm-3" for="id_test">ID Test</label>
				<div class="col-sm-6">
					<input readonly type="text" class="form-control" name="id_test" maxlength="11" value=<?php echo $users->AutoNumber(); ?>>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="id_pendaftaran">ID Pendaftaran</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="id_pendaftaran" maxlength="30" required autofocus>
				</div>
			</div>
							
			<div class="form-group">
				<label class="control-label col-sm-3" for="Hasil">Hasil</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hasil" maxlength="50" required>
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="id_petugas">Id Petugas</label>
				<div class="col-sm-6">
				<input type="text" class="form-control" name="id_petugas" maxlength="6" required >
				</div>
			</div>

			
			
<!--			<div class="form-group">
				<label class="control-label col-sm-3" for="myimage">Gambar</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="myimage" name="myimage" maxlength="100" required>
				</div>
			</div>				-->
			
			<div class="form-group">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>								
			</div>								
		</form>
	</div> <!--ROW-->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/footer.php"; ?>
</div> <!-- CONTAINER -->
