<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pendaftaran Siswa Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<?php
	session_start();
	$status_home = "active";
	$status_pendaftaran = null;
	$status_infrmasi=null;
	$status_hasil=null;
	$status_siswabaru=null;
	$status_login = null;
	$_SESSION['login_setup'] = NULL;
	//
	include_once 'page/header.php';
	$nama = isset($_SESSION['login_user']) ? $_SESSION['login_user'] : null;

?>
<div class="container">
        
        <header class="jumbotron hero-spacer">					  
	    <div style="border:0px solid black;"><p><h2><font style="Comic Sans MS">Selamat Datang di Website Penerimaan siswa Baru SMK Negeri 3 Kota Cilegon </font></h2></p></div>
		<img class="img-thumbnail" src="img/smk3.jpg" width="272" height="200" align="right" />
        <div style="border:0px solid black;width:65%;"><p><h4 style="text-align:justify;">SMK Negeri 3 Cilegon beroperasi sejak tahun 2009, terlahir sebagai bentuk upaya dalam  
			memenuhi kebutuhan SDM dalam bidang pariwisata, disebabkan Kota Cilegon merupakan wilayah 
			yang memiliki potensi selain sebagai kota industri juga merupakan kota tujuan wisata.
			Berdasarkan Peraturan Walikota Cilegon No. 10 Tahun 2011 tentang Pendirian SMK Negeri 3 Cilegon, 
			melalui dinas pendidikan kota Cilegon, membangun Sekolah Seni dan Pariwisata Negeri dengan bidang
			keahlian Pariwisata dan Tata Boga dengan setatus sekolah negeri yang berkualitas dan berdaya saing 
			dalam tingkat nasional dan inernasional.</h4></p></div>
		<div style="border:0px solid black;"><a href="/page/pendaftaran/" class="btn btn-success btn-large"  title="Ayo daftar">Daftar Sekarang?</a></div>
	     <!-- Jumbotron Header -->

        <!--header class="jumbotron hero-spacer">
            <h2>SELAMAT DATANG </h2>
         ///garis   
            <p>SMK N 3 adalah bla bala balab</p>
            <p><a href="" class="btn btn-primary btn-large"  title="Ayo daftar">Daftar Sekarang?</a>
            </p>
                            < /modal >
                        </div>
                        <!-- .panel-body -->
                    <!-- /.panel -->
        
<hr style="margin-top:80px;">
</div><!--
			<hr class="featurette-divider" style="margin-top:80px;">
-->

<?php include_once 'page/footer.php'; ?>
