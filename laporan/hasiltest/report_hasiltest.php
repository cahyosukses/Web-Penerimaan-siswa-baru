<?php
	session_start();
	/*if (!$_SESSION['admin']){
		header("location:/admin/failed.php");
	}*/
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$nama_laporan="dataMahasiswa";
	include_once $_SERVER['DOCUMENT_ROOT'] . '/mpdf7/mpdf.php';  
	// instansiasi object database dan user
	$database = new Database();
	$db = $database->getConnection();		
	$user = new petugas($db);

	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/hasiltest.php';
	//include_once $_SERVER['DOCUMENT_ROOT'] . '/objects/prodi.php';
	 	 
	$mahasiswa = new hasiltest($db);

	$stmt = $mahasiswa->report();
	$num = $stmt->rowCount();
	$mpdf = new mPDF('utf-8', 'A4', 11, 'arial');
	ob_start();	 
?>
<html>
	<head>
		<title>Laporan Data Hasil Test</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
  
		<style type="text/css">
			/*table {
    			border-collapse: collapse;	
			}		
	     	table, th, td {
    			border: 1px solid #98BF21;
			}			
			th {background-color:#A7C942;padding:10px;color:#fff;}
			tr:nth-child(even) {background: #CCC}
			tr:nth-child(odd) {background: #FFF}	
			td{padding:5px; font-size: 13px;}		
			.logo, .header{float:left;text-align:center;margin:0;padding:0;}
			.logo{width:15%;}
			.header{width:85%;}*/
			hr{height:3px;color:#000;}			
		</style>
	</head>
	<body>
		<h2 >Data Hasil Test</h2>
		<hr>
		
<?php
	$mpdf->SetHTMLFooter("<hr style='height:1px;margin:0;padding:0;'/><p style='margin:0;padding:0;'>Halaman {PAGENO}</p>");
	// tampilkan data mahasiswa jika ada
	if($num>0){	 
	    //$prodi = new Prodi($db);
	 	
	    echo "<table class='table table-hover table-bordered'>";
	        echo "<thead><tr>";

	        	echo "<th>No</th>";
	            echo "<th>NIM</th>";
	            echo "<th>Nama</th>";
	            echo "<th>Jurusan</th>";
	            echo "<th>Hasil Test</th>";
//	            echo "<th>Alamat</th>";
	        echo "</tr></thead>";
	 	echo "<tbody>";
	        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){	 
	            extract($row);
	            $no=0;
	            $no = $no + 1;	 
	            echo "<tr>";
	            	echo "<td>{$no}</td>";
	                echo "<td>{$NISN}</td>";
	                echo "<td>{$nama}</td>";
	                echo "<td>{$jurusan}</td>";
	                echo "<td>{$hasil}</td>";
	            echo "</tr>";	 
	        }	
	 	echo "<tbody>"; 
	    echo "</table>";
	}else{
		echo "<h2>Tidak Ada	Data</h2>";	
	}
?>
	</body>
</html>
<?php	
	$html=ob_get_contents();
	ob_end_clean();
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($namaLaporan . ".pdf", "I");
	exit;
?>
