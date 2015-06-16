<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	$status_home = null;
	$status_pendaftaran = null;
	$status_infrmasi=null;
	$status_hasil="active";
	$status_siswabaru=null;
	$status_login = null;
	
	//$_SESSION['login_setup'] = NULL;
	
	$page_title = "Hasil Test";
	include $path . "/page/header.php";
	include_once $path . '/config/database.php';

	$database = new database();
	$db = $database->getConnection();		
	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/hasiltest.php';
	$users = new hasiltest($db);
	$statement = $users->webawal();
	$num = $statement->rowCount();

		 
		echo "<div class='container'>";

			echo "<div class='page-header '>";
			echo "<h2>Data Hasil Test Yang Lulus Dan Tidak Lulus</h2>";
			echo "</div>";
		//echo "<div class='right-button-margin'>";
	   	//echo "<a href='insert.php' class='btn btn-primary pull-left'><i class='glyphicon glyphicon-plus-sign'></i> Tambah Data Hasil Test</a>";
		//echo "<hr>";
		//echo "</div>";
		
			echo "<div class='row'>";
		//if($num>0){
		echo "<div>";
			echo "<table class='table table-hover table-striped'>";
					echo "<tr>";
					echo "<th>No</th>";
					echo "<th>NISN</th>";
					//echo "<th>ID Test</th>";
					echo "<th>Nama</th>";
					//echo "<th>ID Pendaftaran</th>";
					echo "<th>Jurusan</th>";
					echo "<th>Hasil</th>";
					//echo "<th>Petugas</th>";
					//echo "<th>Actions</th>";
				echo "</tr>";
				
				$x = 0;
				$no = 0;
				$subtotal = 0;
	
				while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
					extract($row);
						
					echo "<tr>";
					$no = $no + 1;
					echo "<td>{$no}</td>";
					echo "<td>{$NISN}</td>";
					echo "<td>{$nama}</td>";
					echo "<td>{$jurusan}</td>";
					/*if($hasil = "Di terima")
							echo "<td class='success'>{$hasil}</td>";
						else
							echo "<td class='danger'>{$hasil}</td>";*/
					
					//echo"</td>";
					echo "<td>{$hasil}</td>";
					//echo "</td>";
					//echo "<td style='width:180px;'>";
					//echo "<a href='update.php?id={$id_petugas}' class='btn btn-default col-sm-5'>Edit</a>";
					//echo "<a href='update.php?id={$id_petugas}' class='btn btn-default col-sm-5'>Edit</a>";
					//echo "<a kode='{$id_petugas}' class='btn btn-danger delete-object col-sm-5 col-sm-offset-1'>Hapus</a>";
					//echo "</td>";
					echo "</tr>";
					$x = $x + 1;
					}

			echo "</table>";
				echo "<div class='row text-center'>";
				//include_once 'paging.php';
				echo "</div>";
			echo "</div>";
			echo "</div>"; //container

		include $path . "/page/footer.php";
	?>