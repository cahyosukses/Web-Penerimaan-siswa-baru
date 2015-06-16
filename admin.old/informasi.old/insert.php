<?php
	session_start();
	if (!$_SESSION['admin']){
		header("location:/admin/failed.php");
	}
	
	$path = $_SERVER['DOCUMENT_ROOT'];

	include_once $path . '/config/database.php';

	$database = new database();
	$db = $database->getConnection();		

	$page_title = "Data Hewan";

	include_once $path . '/admin/header.php';
	include_once $path . '/objects/hewan.php';
	
	$hewan = new hewan($db);

	echo "<div class='container'>";

	if($_POST){
		if($_SESSION['admin']){
			$hewan->hewan_kode = $_POST['hewan_kode'];	    
			$hewan->hewan_nama = $_POST['hewan_nama'];
			$hewan->hewan_jenis = $_POST['hewan_jenis'];
			$hewan->detail = $_POST['detail'];
			
			//Upload Image
			if(isset($_FILES['myimage'])) {
				$filename = $_FILES['myimage']['name'];
				$extension = end(explode(".", $filename));
				$customname = $_POST['hewan_kode'];
				$newfilename = $customname . "." . $extension;

				move_uploaded_file($_FILES['myimage']['tmp_name'], $path . '/images/' .$newfilename);
			}
			
			if($hewan->Insert()){
				echo "<div class='alert alert-success alert-dismissable'>";
					echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "Hewan berhasil ditambahkan.";
				echo "</div>";
			}

			else {
				echo "<div class='alert alert-danger alert-dismissable'>";
					echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "Gagal menambahkan hewan";
				echo "</div>";
			}
		}
		else {
			header("location:/admin/failed.php");
		}
	}	
	
?>
	<div class='page-header'>
	<h2>Tambah Hewan</h2>
	</div>
	<div class='row'>
		<form action='' method='post' class='form-horizontal' enctype='multipart/form-data' role='form'>

			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_kode">Kode</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_kode" maxlength="10" required autofocus>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_nama">Nama Hewan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_nama" maxlength="30" required>
				</div>
			</div>
							
			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_jenis">Jenis Hewan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_jenis" maxlength="50" required>
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="detail">Detail</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="detail" required></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="myimage">Gambar</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" accept='.jpg' id="myimage" name="myimage" maxlength="100" required>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
				<button type="submit" class="btn btn-primary col-sm-2">Simpan</button>
				<a href='/admin/hewan/' class="btn btn-warning col-sm-2" style='margin-left:10px; padding-left:10px;'>Batal</a>
			</div>								
			</div>								
		</form>
	</div> <!--ROW-->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/footer.php"; ?>
</div> <!-- CONTAINER -->
