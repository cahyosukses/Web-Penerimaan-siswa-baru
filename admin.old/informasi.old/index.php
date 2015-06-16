<?php 
	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
   	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/informasi.php';
	$database = new Database();
	$db = $database->getConnection();		
	$user = new informasi($db);
	$path=$_SERVER['DOCUMENT_ROOT'];

	$page_title = "Informasi";
	include_once $path . '/admin/header.php';

	// set header
	echo "<div class='right-button-margin'>";
   echo "<a href='create.php' class='btn btn-primary'><i class='glyphicon glyphicon-plus'></i> Tambah Data</a>";
	echo "</div>";

	// halaman yg diberikan melalui GET, halaman default adalah satu
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	 
	// set jumlah data per halaman
	$records_per_page = 5;
	 
	// query LIMIT clause
	$from_record_num = ($records_per_page * $page) - $records_per_page;
	$obat = new informasi($db);
	 
		//$users = new petugas($db);

		$statement = $obat->readAll($page, $from_record_num, $records_per_page);
		$num = $statement->rowCount();
	 
	// tampilkan data mahasiswa jika ada
	if($num>0){	 
	  //  $kategoriobat = new kategoriobat($db);
	 
	    echo "<table class='table table-hover table-responsive table-bordered'>";
	        echo "<tr>";
	            echo "<th>id_informasi</th>";
	            echo "<th>Judul</th>";
	            echo "<th>deskripsi</th>";
	            echo "<th>id_petugas</th>";
	        echo "</tr>";
	 
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){	 
	            extract($row);	 
	            echo "<tr>";
	                echo "<td>{$id_informasi}</td>";
	                echo "<td>{$judul}</td>";
	                echo "<td>{$deskripsi}</td>";
						 echo "<td>{$id_petugas}</td>";
						 echo "<td>";
							echo "<a href='adm_updateobat.php?id={$id_informasi}' class='btn btn-default left-margin'>Edit </a>";
    						echo "<a delete-id='{$id_informasi}' class='btn btn-default delete-object'>Delete</a>";
	                echo "</td>";	 
	            echo "</tr>";	 
	        }	 
	    echo "</table>";
	 
	    include_once 'paging.php';
	}
	 
	// jika tidak ada data
	else{
	    echo "<div>Tidak ada data mahasiswa</div>";
	}
?>
<script>
	$(document).on('click', '.delete-object', function(){	 
	    var id = $(this).attr('delete-id');
	    var q = confirm("Anda yakin hapus data ini?");	 
	    if (q == true){	 
	        $.post('adm_deleteobat.php', {
	            object_id: id
	        }, function(data,status){
					alert(data);	        	
	            location.reload();
	        }).fail(function() {
	            alert('Gagal menghapus.');
	        });	 
	    }
	    return false;
	});
</script>

<?
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$records_per_page = 5;
		$from_record_num = ($records_per_page * $page) - $records_per_page;

		$statement = $user->readAll($from_record_num, $records_per_page);
		$num = $statement->rowCount();


	include_once $path.'/admin/footer.php';
?>