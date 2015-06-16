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

		$page_title = "Data Petugas";

		include_once $path . '/admin/header.php';

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$records_per_page = 100;
		$from_record_num = ($records_per_page * $page) - $records_per_page;

		include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
		
		$users = new petugas($db);

		$statement = $users->readAll($from_record_num, $records_per_page);
		$num = $statement->rowCount();
		 
		echo "<div class='container'>";

			echo "<div class='page-header '>";
			echo "<h2>Data Petugas</h2>";
			echo "</div>";
		echo "<div class='right-button-margin'>";
	   	echo "<a href='insert.php' class='btn btn-primary pull-left'><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Petugas</a>";
		//echo "<hr>";
		echo "</div>";
		
			echo "<div class='row'>";
if($num>0){
			echo "<table class='table table-hover table-condensed table-bordered'>";
					echo "<tr>";
					echo "<th>No</th>";
					echo "<th>id Petugas</th>";
					echo "<th>Nama Petugas</th>";
					echo "<th>Password</th>";
					echo "<th>Level</th>";
					echo "<th>Actions</th>";
				echo "</tr>";
				$total_rows = $users->countAll();
				//$nomor=($page-1)*$total_rows;
				//$nomor=($page-1)*5;
				$halaman = 0;
				$no = 0;
				$subtotal = 0;
	
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
					extract($row);
					echo "<tr>";
					$no = $no + 1;
					
					echo "<td>{$no}</td>";
					echo "<td>{$id_petugas}</td>";
					echo "<td>{$nama_petugas}</td>";
					echo "<td>{$password}</td>";
					//echo "<td>{$level}</td>";
					echo "<td style='width:200px;'>";
						if($level > 0)
							echo "Administrator";
						else
							echo "User";
						echo "</td>";
						echo "<td style='width:180px;'>";
							//echo "<a href='update.php?id={$id_petugas}' class='btn btn-default col-sm-5'>Edit</a>";
							echo "<a href='update.php?id={$id_petugas}' class='btn btn-default col-sm-5'>Edit</a>";
							echo "<a kode='{$id_petugas}' class='btn btn-danger delete-object col-sm-5 col-sm-offset-1'>Hapus</a>";
						echo "</td>";
					echo "</tr>";
					
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
	}
	else {
		header("location:/admin/error.php");
	}
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
