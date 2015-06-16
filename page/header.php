<!DOCTYPE html>
<html lang="en">
<head><title><?php echo $page_title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/css/bootstrap.css" rel="stylesheet">
  <link href=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/css/mystyle.css" rel="stylesheet">
  <script src=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/js/jquery.js"></script>
  <script src=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/js/bootstrap.js"></script>	
</head>
<body>
<div class="container">
	  <div class="row">
	  	<div class="header">
	  				<img src="/img/home1.jpg" title="Foto Cover" width="100%" height="200" align="center" class="img-rounded" />
	  				<p></p>
	  				</div>
		<!--<div id="header" class-"col-xs-6 col-md-3">

		   <div id="head-left">
			<img id="logo" src="/img/Logo.jpg" / class="img-circle">
		  </div>
		  <div class="text-center">
			<div id="head-desc">
				<h1><b>SMK N</b></h1>
			    <h5><p>Serang - Banten</p></h5>
			</div>		
			</div>
	   	  <div id="head-right">
			<img id="logo" src="/img/photo.jpg" / class="img-circle">
		  </div> 
		</div>-->
	  
	  <ul class="nav nav-pills nav-justified" >
<?php
	echo "<li class='{$status_home}'>";
		echo "<a href='/'>Home</a>";	
	echo "</li>";
	echo "<li class='{$status_pendaftaran}'><a href='/page/pendaftaran/'>PENDAFTARAN</a></li>";
	echo "<li role='presentation' class='dropdown' class='{$status_infrmasi}'><a href='/page/informasi/' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>INFORMASI <span class='caret'></span></a>";
		echo"<ul class='dropdown-menu' role='menu'>";
		echo "<li class='{$status_hasil}'><a href='/page/informasi/cara-pendaftaran.php'>informasi Cara Pendaftaran</a></li>";
		//echo "<li class='{$status_siswabaru}'><a href='/page/informasi/jadwal.php'>Informasi Jadwal Pendaftaran</a></li>";
		echo "<li class='{$status_siswabaru}'><a href='/page/informasi/Persaratan.php'>Persaratan</a></li>";
		echo "<li class='{$status_siswabaru}'><a href='/page/informasi/'>Informasi Jurusan</a></li>";
		//echo "<li class='{$status_siswabaru}'><a href='/page/informasi/'>Informasi Pengumuman</a></li>";
		echo "<li class='{$status_siswabaru}'><a href='/page/informasi/'>Informasi Umum</a></li>";
		echo "<li class='{$status_siswabaru}'><a href='/page/informasi/'>Informasi Sekolah</a></li>";
		echo    "</ul>";
		echo"</li>";
	echo "<li class='{$status_hasil}'><a href='/page/hasiltest/'>HASIL TEST</a></li>";
	echo "<li class='{$status_siswabaru}'><a href='/page/siswabaru/'>SISWA BARU</a></li>";
	//echo "<li class='{$status_login}'><a href='/page/login.php'>LOGIN</a></li>";
	echo "</li>";

?>
	  </ul>
</div>
</div>
</body>
</html>
