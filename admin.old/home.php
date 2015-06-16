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
   	include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
	$database = new Database();
	$db = $database->getConnection();		
	$user = new petugas($db);
	if ($user->get_session()==false){
		header("location:failed.php");
	}																   
	$page_title = "Selamat Datang";
	include_once 'header.php';

	
?>
<body>

	<div class='container'>
			<?php
				echo "<div class='page-header'>";
				echo "<h2>Selamat Datang</h2>" ;
?>
	<p>Berdoa terlebih dahulu sebelum beraktifitas </p>";
	<div class="row pull-right">
                    <div class="col-lg-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading"><span class="glyphicon glyphicon-time"></span>
                            Hari Ini 
                        </div>
                        <div class="panel-body">
                        <h3><span id="date"><?php print date('d-F-Y'); ?></span></h3>
                        <h1><span id="clock"><?php print date('H:i:s'); ?></span></h1>
			                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
                            <?php
			include_once 'footer.php';
?>
</body>
