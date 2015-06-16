<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $page_title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/mystyle.css" rel="stylesheet">
  <script src="/js/jquery.js"></script>
  <script src="/js/bootstrap.min.js"></script>	
</head>
<body>
<!--div class="header">
	  				<img src="/img/home1.jpg" title="Foto Cover" width="100%" height="50" align="center" class="img-rounded" />
	  				<p></p>
	  				</div-->
	<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
			<div class="collapse navbar-collapse" id="menuUtama"> 
			  <ul class="nav navbar-nav"> 
				<li class=""><a href="/admin/home.php">
				<span class="glyphicon glyphicon-home"></span> Home</a></li>

				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-list"></span> Data <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/informasi/"><span class="glyphicon glyphicon-list"></span> Informasi</a></li>
					<div class="divider"></div>
					<li><a href="/admin/hasiltest/"><span class="glyphicon glyphicon-duplicate"></span> Hasil Test</a></li>
					<div class="divider"></div>
					<li><a href="/admin/siswa/"><span class="glyphicon glyphicon-education"></span> Siswa</a></li>
					<div class="divider"></div>
					<li><a href="/admin/petugas/"><span class="glyphicon glyphicon-user"></span>  Petugas</a></li>
				  	<div class="divider"></div>
					<li><a href="/admin/registrasi/"><span class="glyphicon glyphicon-plus"></span>  Registrasi</a></li>
				  	
				  </ul>
				</li>

				<!--li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/pembayaran/">Lihat</a></li>
					<li><a href="/admin/pembayaran/insert.php">Tambah</a></li>
				  </ul>
				</li-->
				
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-plus"></span> Tambah<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/informasi/insert.php">Informasi</a></li>
					<li><a href="/admin/siswa/insert.php">Siswa</a></li>
					<li><a href="/admin/hasiltest/insert.php">Hasil Test</a></li>
					<li><a href="/admin/petugas/insert.php">Petugas</a></li>
					<li><a href="/admin/registrasi/insert.php">Registrasi</a></li>

				  </ul>
				</li>

				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-print"> Laporan<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/laporan/hasiltest/">Hasil Test</a></li>
					<div class="divider"></div>
					<li><a href="/laporan/petugas/">Cetak Petugas</a></li>
				  </ul>
				</li>

			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<p class="navbar-text" role="button"> <span class="glyphicon glyphicon-user"></span>
				<?php
				echo $cetak;
				?>
				</p>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pilihan <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/"><span class="glyphicon glyphicon-cog"> Pengaturan</sapan></a></li>
					<li><a href="/page/session.php?act=logoff"><span class="glyphicon glyphicon-log-out"> Logout</sapan></a></li>
				  </ul>
				</li>
			  </ul>
			</div>
    </div> <!--container-fluid-->
</nav>

</body>
</html>
