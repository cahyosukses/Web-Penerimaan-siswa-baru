<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" +(sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>

<?php 
	session_start();
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
	$database = new database();
	$db = $database->getConnection();

	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$users  = new petugas($db);
	$cetak=($_SESSION['login_user']);
	if($_SESSION['admin']){
			$page_title = "Halaman Administrator";
			include_once 'header.php';
			echo "<div class='container'>";
				echo "<div class='page-header'>";
				echo "<h2>Selamat Datang <b>$cetak</b> </h2>";
				//echo 
//				echo "</div>";
//				echo "<div class='row'>";
//				echo "<p>Jangan Lupa Berdoa Sebelum Melakukan Aktifitas </p>";
				//echo $cetak;
				echo "</div>";
				//tampil jam
				//echo "</div>";
	}
	else {
		header("location:/admin/failed.php");
	}
?>
<div class='row'>
    <div class="col-md-9">
	<div class='alert alert-success alert-dismissable'>
        <marquee>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>Tutup</button>
	    <i class="alert">Jangan Lupa Berdoa Sebelum Melakukan Aktifitas <?php echo $cetak; ?> </i>
			</marquee>    
	        </div></div>

				
				
<div class="row pull-right">
                    <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Waktu Hari Ini
                        </div>
                        <div class="panel-body">
                                        	<h4><span id="date"><?php print date('d F Y'); ?></span></h4>
											<h1><span id="clock"><?php print date('H:i:s'); ?></span></h1>
			                            

                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
<?php
include_once 'footer.php';
?>