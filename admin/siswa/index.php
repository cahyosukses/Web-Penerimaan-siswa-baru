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

		$page_title = "Data Siswa";

		include_once $path . '/admin/header.php';

		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		$records_per_page = 100;
		$from_record_num = ($records_per_page * $page) - $records_per_page;

		include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/calonsiswa.php';
		$users = new calonpeserta($db);

		$statement = $users->readAll($from_record_num, $records_per_page);
		$num = $statement->rowCount();
		 
		echo "<div class='container'>";

		echo "<div class='page-header '>";
		echo "<h2>Data Siswa</h2>";
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
					echo "<th>NISN</th>";
					echo "<th>Nama Peserta</th>";
					echo "<th>Jenis Kelamin</th>";
					echo "<th>Tempat lahir</th>";
					echo "<th>Tnggal lahir</th>";
					echo "<th>Agama</th>";
					//echo "<th>Kewarganegaraan</th>";
					//echo "<th>Anak Ke</th>";
					//echo "<th>Jumlah Saudara</th>";
					echo "<th>Alamat</th>";
					echo "<th>No telpon</th>";
					echo "<th>tinggal dengan</th>";
					//echo "<th>golongan darah</th>";
					echo "<th>Asal Sekolah</th>";
					echo "<th>Tahun Lulus</th>";
					echo "<th>Kota</th>";
					//echo "<th>Kabupaten</th>";
					echo "<th>Action</th>";
					//echo "<th></th>";
					//echo "<th></th>";
					//echo "<th></th>";


				echo "</tr>";
//				$total_rows = $users->countAll();
				//$nomor=($page-1)*$total_rows;
				//$nomor=($page-1)*5;
				$halaman = 0;
				$no = 0;
//				$subtotal = 0;
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
					extract($row);
					echo "<tr>";
					$no = $no + 1;
					echo "<td>{$no}</td>";
					echo "<td>{$nisn}</td>";
					echo "<td>{$nama}</td>";
					echo "<td>{$jenis_kelamin}";
					echo"</td>";

					echo "<td>{$tempat_lahir}</td>";
					echo "<td>{$tgl_lahir}</td>";
					echo "<td>{$agama}</td>";
					echo "<td>{$kewarganegaraan}</td>";
					//echo "<td>{$anak_ke}</td>";
					//echo "<td>{$jumlah_saudara}</td>";
					echo "<td>{$alamat_lengkap}</td>";
					echo "<td>{$nomor_tlp}</td>";
					//echo "<td>{$tinggaldengan}</td>";
					//echo "<td>{$gol_darah}</td>";
					echo "<td>{$asal_sekolah}</td>";
					echo "<td>{$tahun_lulus}</td>";
					echo "<td>{$kota}</td>";
					//echo "<td>{}</td>";
					//echo "<td>{}</td>";


					//echo "<td>{$level}</td>";
					/*echo "<td style='width:200px;'>";
						if($level > 0)
							echo "Administrator";
						else
							echo "User";
						echo "</td>";
					*/	echo "<td style='width:50px;'>";
							//echo "<a href='update.php?id={$id_petugas}' class='btn btn-default col-sm-5'>Edit</a>";
							echo "<a href='select.php?id={$nisn}' class='btn btn-success '><i class='glyphicon glyphicon-edit'></i></a>";
							echo "<a href='update.php?id={$nisn}' class='btn btn-primary '><i class='glyphicon glyphicon-edit'></i></a>";
							echo "<a kode='{$nisn}' class='btn btn-danger delete-object'><i class='glyphicon glyphicon-trash'></i></a>";
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
	        $.post('delete.php', {
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