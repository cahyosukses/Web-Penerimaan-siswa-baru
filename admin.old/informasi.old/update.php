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
	$kode = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Kode Error.');

	include_once $path . '/admin/header.php';
	include_once $path . '/objects/hewan.php';
	
	$hewan = new hewan($db);
	$hewan->hewan_kode = $kode;	 
	$hewan->ShowOne();
	
	echo "<div class='container'>";

	if($_POST){	 
		if($_SESSION['admin']){
			$hewan->hewan_kode = $_POST['hewan_kode'];	    
			$hewan->hewan_nama = $_POST['hewan_nama'];
			$hewan->hewan_jenis = $_POST['hewan_jenis'];
			$hewan->detail = $_POST['detail'];
			
			//Upload Image
	//		if(isset($_FILES['myimage'])) {
				$filename = $_FILES['myimage']['name'];
				$extension = end(explode(".", $filename));
				$customname = $_POST['hewan_kode'];
				$newfilename = $customname . "." . $extension;
				$targetfile = $path . '/images/' .$newfilename;

				if(file_exists($targetfile)) unlink($targetfile);
				
				move_uploaded_file($_FILES['myimage']['tmp_name'], $targetfile);
		//	}

			if($hewan->Update()){
				echo "<div class='alert alert-success alert-dismissable'>";
					echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "Data berhasil diubah.";
				echo "</div>";
			}
		 
			else{
				echo "<div class='alert alert-danger alert-dismissable'>";
					echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "Gagal mengubah data";
				echo "</div>";
			}
		}
		else {
			header("location:/admin/failed.php");
		}
	}	
	
?>
	<div class='page-header'>
	<h2>Update Hewan</h2>
	</div>
	<div class='row'>
		<form action='#' method='post' class='form-horizontal' enctype='multipart/form-data' role='form'>

			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_kode">Kode</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_kode" maxlength="11" readonly value="<?php echo $hewan->hewan_kode; ?>">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_nama">Nama Hewan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_nama" maxlength="30" value="<?php echo $hewan->hewan_nama; ?>">
				</div>
			</div>
							
			<div class="form-group">
				<label class="control-label col-sm-3" for="hewan_jenis">Jenis Hewan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="hewan_jenis" maxlength="50" value="<?php echo $hewan->hewan_jenis; ?>">
				</div>
			</div>				
						
			<div class="form-group">
				<label class="control-label col-sm-3" for="detail">Detail</label>
				<div class="col-sm-6">
					<textarea class="form-control" name="detail" ><?php echo $hewan->detail; ?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="myimage">Gambar</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" accept='.jpg' id="myimage" name="myimage" maxlength="100">
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
