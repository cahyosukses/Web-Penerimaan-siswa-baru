<?php
		session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
   	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$path = $_SERVER['DOCUMENT_ROOT'];
	$database = new database();
	$db = $database->getConnection();		
	$page_title = "Ubah Petugas";
	include_once $path . '/admin/header.php';
	$users = new petugas($db);
	// set property ID mahasiswa yang ingin diubah
	// ambil nilai semua property dari mahasiswa
	$users->update();
	// cek jika form disubmit
	if($_POST){	 
	    // set nilai property mahasiswa
	    $users->id_petugas = $_POST['id_petugas'];	    
	    $users->nama_petugas = $_POST['nama_petugas'];
	    $users->password = $_POST['password'];
	    $users->level = $_POST['level'];
	    
	    // simpan mahasiswa
	    if($users->update()){
	        echo "<div class='alert alert-success alert-dismissable'>";
	            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	            echo "Petugas berhasil diubah.";
	        echo "</div>";
	    }
	 
	    // jika gagal menyimpan
	    else{
	        echo "<div class='alert alert-danger alert-dismissable'>";
	            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
	            echo "Gagal mengubah data Petugas";
	        echo "</div>";
	    }
	}	
	
?>	
	<form action='update.php?id=<?php echo $id_petugas; ?>' method='post'>		
		<div class="form-group col-md-8">
		  <label class="control-label" for="id_petugas">Id Petugas</label>
		  <input type="text" class="form-control" name="id_petugas" maxlength="100" value="<?php echo $users->id_petugas; ?>">
		</div>
		<div class="form-group col-md-8">
		  <label class="control-label" for="nama_petugas">Nama Petugas</label>
		  <input type="text" class="form-control" name="nama_petugas" maxlength="100" value="<?php echo $users->nama_petugas; ?>">
		</div>
		<div class="form-group col-md-8">
		  <label class="control-label" for="password">Password</label>
		  <input type="text" class="form-control" name="password" maxlength="100" value="<?php echo $users->password; ?>">
		</div>
		<div class="form-group col-md-8">
		  <label class="control-label" for="level">Level</label>
		  <input type="text" class="form-control" name="level" maxlength="100" value="<?php echo $users->level; ?>">
		</div>
		<div class="form-group col-md-12">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>								
 	</form>
 	
 	<script type="text/javascript" >
		$('#tgldaftar').datepicker({
    		format: 'yyyy-mm-dd'
		});
	</script>
<?php
	// set footer	


	include_once $path . '/admin/footer.php';
?>