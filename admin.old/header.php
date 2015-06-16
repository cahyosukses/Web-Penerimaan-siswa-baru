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
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
			<div class="collapse navbar-collapse" id="menuUtama"> 
			  <ul class="nav navbar-nav"> 
				<li class=""><a href="/">
				<span class="glyphicon glyphicon-home"></span> Home</a></li>

				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-list"></span> Data <span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/informasi/"><span class="glyphicon glyphicon-list"></span> Informasi</a></li>
					<div class="divider"></div>
					<li><a href="/admin/hasiltest/"> Hasil Test</a></li>
					<div class="divider"></div>
					<li><a href="/admin/siswa/"> Siswa</a></li>
					<div class="divider"></div>
					<li><a href="/admin/petugas/"> Petugas</a></li>
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
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">asd<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/pembelian/">asd</a></li>
					<div class="divider"></div>
					<li><a href="/admin/pembelian/insert.php">asd</a></li>
				  </ul>
				</li>

				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><span class="glyphicon glyphicon-print"> Laporan<span class="caret"></span></a>
				  <ul class="dropdown-menu" role="menu">
					<li><a href="/admin/konsumen/">Lihat S</a></li>
					<div class="divider"></div>
					<li><a href="/admin/pesanan/">Lihat Peserta</a></li>
					<div class="divider"></div>
					<li><a href="/admin/stok/">as</a></li>
					<div class="divider"></div>
					<li><a href="/report/pesanan/">Cetak Pesanan</a></li>
				  </ul>
				</li>

			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<p class="navbar-text"> <span class="glyphicon glyphicon-user"></span>
				<?php
				$username = isset($_SESSION['id_petugas']) ? $_SESSION['id_petugas'] : null;
				echo $username;
				?>
				</p>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pilihan<span class="caret"></span></a>
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
