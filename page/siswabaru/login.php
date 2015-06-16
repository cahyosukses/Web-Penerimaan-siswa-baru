<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Nama" content="asdas">
    <link rel="icon" href="favicon.ico">

    <title>Form Login</title>



  </head>
 

  <body>
    <div class="container">
	<h2 class="style1"><center><h2>Calon Peserta Didik Baru SMK Negeri 3 Cilegon</h2></center></h2>
	<center><img src="img/SMKN3.jpg" alt="SMKN 3 CILEGON" width="147" height="148" />
        <div class="row">
            <div class="col-md-5 col-md-offset-4">
                <hr>
        <?php 
        if (!isset($_SESSION['nama_petugas'])){
        ?>
                <div class="login-panel panel panel-success">
                    <div class="panel-heading">
                        <h2 class="panel-title">Form Login</h2>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="proseslogin.php">
                            <fieldset>
                                <div class="form-group">
                                   <input class="form-control"  placeholder="User name" name="nama_petugas"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">ingat saya
                                    </label>
                                </div>
                                <input type="submit" name="masuk" value="Log In" class="btn btn-primary">
                                <input type="submit" value="Reset" class="btn btn-inverse">
                                <!-- Change this to a button or input when using this as a form -->
                            </fieldset>
                        </form>
                    </div>
            <?php
            }else{
                echo "Anda Telah Login : " ;
                if(isset($_SESSION['nama_petugas'])){}
                echo ($_SESSION['nama_petugas']);
            }
            ?>
                    <div class="panel-footer">
                        <h2 class="panel-title"></h2>
                    </div>
                    

                </div>
                <hr>

            </div>
        </div>
              
    </div>

    <!-- /.container -->
    <script src="dist/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script

    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>