<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/css/bootstrap.min.css" rel="stylesheet">
  <link href=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/css/mystyle.css" rel="stylesheet">
  <script src=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/js/jquery.js"></script>
  <script src=<?php $_SERVER['DOCUMENT_ROOT'] ?> "/js/bootstrap.min.js"></script>	
</head>
<body>

<!--div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<div class="account-wall" >
			<h1 class="text-center login-title">LOGIN</h1>
				<form class="form-login" action="/admin/login.php" method="POST">
					<img src="images/login.png" class="image-responsive" /><!--id="profile-img"/>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required autofocus />
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
		</div>
	</div>
</div-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <h1 class="text-center login-title">Silahkan Login</h1>
			<?php
			   session_start();
			   include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php'; 
			   include_once $_SERVER['DOCUMENT_ROOT'] . '/objek/petugas.php';
			   $database = new Database();

			   $db = $database->getConnection();
			   $users = new petugas($db);
			   if (isset($_GET['q'])){
					if( $_GET['q'] == 'logout'){
						$users->user_logout();	
						}
						}								 
						if($_POST){						 	 
						    $users->id_petugas = $_POST['username'];
						    $users->nama_petugas = $_POST['username'];
						    $users->password = $_POST['password'];	    	    	 
						    if($users->check_login()){
						        header("location:home.php");;
						    }else{				    	
                          echo '<div class="alert alert-success alert-dismissable fade in">
                                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                   <h5>Username dan Password Anda mungkin salah</h5>
                             </div>';                         
						    }
						}
					 ?>
                <div class="account-wall">
                    <!--img class="profile-img" src="images/baktihusada.gif" alt=""-->
                    <form class="form-signin" action="" method="POST">
                        <input type="text" id="username" class="form-control" placeholder="Username" required autofocus name="username">
                        <input type="password" id="password" class="form-control" placeholder="Password" required name="password">
                        <button class="btn btn-md btn-primary btn-block" id="login" type="submit">
                            Sign in</button>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>  


<?php 
include_once 'footer.php'; ?>
</body>
</html>
