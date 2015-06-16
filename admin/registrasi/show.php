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

	$page_title = "Data Petugas";
	
	include_once $path . '/admin/header.php';
	include_once $path . '/objek/petugas.php';
	$pesanan_detail = new petugas($db);

	
	$kode = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Kode Error.');

	$pesanan_detail = new petugas($db);
	$pesanan_detail->id_petugas = $kode;
	$statement = $pesanan_detail->ShowOne();
	
	echo "<div class='container'>";

		echo "<div class='page-header'>";
		echo "<h2>Data Detail Petugas</h2>";
		echo "</div>";

    echo "<div class='row'>";
    //echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
//		echo "<th>No. </th>";
		/*echo "<th>ID Petugas</th>";
		echo "<th>Nama Petugas</th>";
		echo "<th>Password</th>";
		echo "<th>Level</th>";*/
		//echo "<th>Qty</th>";
		//echo "<th>Total</th>";
		//echo "<th>Actions</th>";
	echo "</tr>";
	//$no = 0;
	//$subtotal = 0;
		//while ($row = $statement->fetch(PDO::FETCH_ASSOC)){	 
		//	extract($row);
		//	$totalperitem = $qty * $kategori_harga;
//			echo "<tr>";
			//$no = $no + 1;
			echo "{$id_petugas}";
			echo "<td>{$nama_petugas}</td>";
			echo "<td>{$password}</td>";
			echo "<td>{$level}</td>";
			//echo "<td>Rp. " . number_format($kategori_harga, 2, ',','.') . "</td>";
			//echo "<td>{$qty}</td>";
			//echo "<td>Rp. ". number_format($totalperitem, 2, ',','.') . "</td>";
			//echo "<td>";
			//echo "<a kode='{$hewan_kode}' object_id='{$pesanan_no}' id = '{$kategori_id}' class='btn btn-default delete-object'>Delete</a>";
			//echo "</td>";
			echo "</tr>";
			//$subtotal = $subtotal + $totalperitem;
			echo "</table>";
			echo "<a href='/admin/petugas/' class='btn btn-warning'>Kembali</a>";
	
	echo "</div>"; //row
		
	include_once $path . '/admin/footer.php';

	echo "</div>"; //container
?>

<script>
	$(document).on('click', '.delete-object', function(){	 
	    var id = $(this).attr('id');
	    var kode = $(this).attr('kode');
		var object_id = $(this).attr('object_id');
	    var q = confirm("Anda yakin hapus data ini?");	 
	    if (q == true){	 
	        $.post('delete_detail.php', { object_id: object_id, id: id, kode: kode }, 
			function(data,status){alert(data);location.reload();})
	        .fail(function() { alert('Gagal menghapus.');});	 
	    }
	    return false;
	});

</script>