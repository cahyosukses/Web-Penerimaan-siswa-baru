<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
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
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			
			<h1 class="text-center login-title">LOGIN ADMIN</h1>
			<div class="account-wall" >
				<form class="form-login" action="/admin/login.php" method="POST">
					<img src="/img/logo.jpg" id="profile-img" />
					<input type="text" class="form-control" id="email" name="nama_petugas" placeholder="Nama / ID anda" required autofocus />
					<p></P>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
					<button class="btn btn-lg btn-success btn-block" type="submit">Login</button>

				</form>


			</div>
		</div>
	</div>
</div>
	<?php
include_once 'footer.php';
?>
</body>
</html>
