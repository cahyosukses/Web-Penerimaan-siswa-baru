<?php
	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
   	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$path = $_SERVER['DOCUMENT_ROOT'];
	$database = new database();
	$db = $database->getConnection();		

	$page_title = "Data Petugas";
	include_once $path . '/admin/header.php';

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$records_per_page = 5;
		$from_record_num = ($records_per_page * $page) - $records_per_page;

		include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
		
		$users = new petugas($db);

		$statement = $users->readAll($page, $from_record_num, $records_per_page);
		$num = $statement->rowCount();
		 
		echo "<div class='container'>";
			echo "<div class='page-header'>";
			echo "<h2>Data Petugas</h2>";
			echo "</div>";
			echo "<div class='row'>";

		if($num>0){
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>Id Petugas</th>";
					echo "<th>Nama Petugas</th>";
					echo "<th>Password</th>";
					echo "<th>Level</th>";
					echo "<th>Action</th>";
				echo "</tr>";
				$x = 0;
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
					extract($row);
					echo "<tr>";
						echo "<td>{$id_petugas}</td>";
						echo "<td>{$nama_petugas}</td>";
						echo "<td>{$password}</td>";
						echo "<td>{$level}</td>";
						echo "<td style='width:200px;'>";
							echo "<a href='update.php?id={$id_petugas}' class='btn btn-primary col-sm-5'>Ubah</a>";
							echo "<a kode='{$id_petugas}' class='btn btn-danger delete-object col-sm-5 col-sm-offset-1'>Hapus</a>";
						echo "</td>";
					echo "</tr>";
					$x = $x + 1;
					}

			echo "</table>";
				echo "<div class='row text-center'>";
				include_once 'paging.php';
				echo "</div>";
			echo "</div>";
			echo "</div>"; //container
		}
		
		else {
			echo "<div>Data Tidak Ada</div>";
		}

		include_once $path . '/admin/footer.php';
?>

<script>
	$(document).on('click', '.delete-object', function(){	 
	    var id = $(this).attr('kode');
	    var q = confirm("Anda yakin hapus data ini?");	 
	    if (q == true){	 
	        $.post('Delete.php', {
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
