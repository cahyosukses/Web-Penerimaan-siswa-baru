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

	$page_title = "Tambah Data informasi";

	include_once $path . '/admin/header.php';
	include_once $path . '/objek/informasi.php';
	
	$users = new informasi($db);


	echo "<div class='container'>";

	if($_POST){	 
	    $users->id_informasi = stripslashes(strip_tags($_POST['id_informasi']));	    
	    $users->judul = stripslashes(strip_tags($_POST['judul']));
	    $users->deskripsi = stripslashes(strip_tags($_POST['deskripsi']));	    
	    $users->id_petugas = stripslashes(strip_tags($_POST['id_petugas']));
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
*/	    include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/informasi.php';
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
<!--script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "modern",
        skin :"lightgray",
        //username : "Some User",
});
</script-->

	<div class='page-header'>
	<h2>Tambah Data infomasi</h2>
	</div>
	<div class='row col-sm-12'>
		<form action='insert.php' method='post' class='form-horizontal' role='form'>

			<div class="form-group">
				<label class="control-label col-sm-3" for="id_informasi">ID Informasi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="id_informasi" maxlength="11" value=<?php echo $users->AutoNumber(); ?> readonly>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="judul">Judul</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="judul" maxlength="30" required autofocus>
				</div>
			</div>
							
			<div class="form-group">
				<label class="control-label col-sm-3" for="deskripsi">DesKripsi</label>
				<div class="col-sm-6">
					<textarea type="text" class="form-control col-sm-6" name="deskripsi" required></textarea>
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-sm-3" for="id_petugas">Id Peugas</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="id_petugas"  required>
					<!--untuk PHP
					<input type='text' class='form-control' name='id_petugas' value='{$cetak}'  required>";-->
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
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
