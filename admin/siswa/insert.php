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

	$page_title = "Tambah Data Petugas";

	include_once $path . '/admin/header.php';
	include_once $path . '/objek/petugas.php';
	
	$users = new petugas($db);

	echo "<div class='container'>";

	if($_POST){	 
	    $users->id_petugas = $_POST['id_petugas'];	    
	    $users->nama_petugas = $_POST['nama_petugas'];
	    $users->password = $_POST['password'];	    
	    $users->level = $_POST['level'];
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
	<h2>Tambah Data Petugas</h2>
	</div>
	<div class='row'>
		<form action='insert.php' method='post' class='form-horizontal' role='form'>

			<div class="form-group">
				<label class="control-label col-sm-3" for="users_kode">ID Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="id_petugas" maxlength="11" value=<?php echo $users->AutoNumber(); ?> readonly>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="users_nama">Nama Petugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="nama_petugas" maxlength="30" required autofocus>
				</div>
			</div>
							
			<div class="form-group">
				<label class="control-label col-sm-3" for="users_jenis">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="password" maxlength="50" required>
				</div>
			</div>				
			
			<!--div class="form-group">
				<label class="control-label col-sm-3" for="users_kelamin">Level</label>
				<div class="col-sm-6">
				<input type="text" class="form-control" name="level" maxlength="6" required placeholder="0 = user, 1 = Administrator">
				</div>
			</div-->
			<?php
			echo "<div class='form-group'>";
		echo "  <label for='usertype' class='col-sm-3 control-label'>Level</label>";
		echo "  <div class='col-sm-6'>";
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

			?>

			
			
<!--			<div class="form-group">
				<label class="control-label col-sm-3" for="myimage">Gambar</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="myimage" name="myimage" maxlength="100" required>
				</div>
			</div>				-->
		</div>
			</div>
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
