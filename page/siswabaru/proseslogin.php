<?php

  session_start();

  require_once("config/koneksi.php");  
  
  //  if ($level=='Admin'){
  //   $_SESSION['nama_petugas'] = "$nama_petugas";
   //  header('location:admin/index.php');
   // }elseif ($level=='User')
    //  {
    // $_SESSION['nama_pe'] = "$nama_petugas";
   //  header('location:siswa/index.php');
   // } # code...

if (isset($_POST['masuk'])) {
  $user = $_POST['nama_petugas'];
  $pass = $_POST['password'];
  //$level = $_POST['level'];

  
  

  //if ($level=='Admin'){
  //$_SESSION['nama_petugas'] = "$nama_petugas";
  //header('location:admin/index.php');
   // }elseif ($level=='User')
    //  {
    // $_SESSION['nama_petugas'] = "$nama_petugas";
   //  header('location:siswa/index.php');
   // }

  $cekuser = mysql_query("SELECT * FROM tbl_petugas WHERE nama_petugas = '$user'");
  $jumlah = mysql_num_rows($cekuser);
  $hasil = mysql_fetch_array($cekuser); 
  if($jumlah==0) {
  echo "User Name Belum Terdaftar!<br/>";
  echo "<a href=\"index.html\">&laquo; Back</a>";
 } else {
  if($pass <> $hasil['password']) {
   echo "password Salah!<br/>";
   echo "<a href=\"index.html\">&laquo; Back</a>";
  } else {
   $_SESSION['nama_petugas'] = "$user";
   header('location:admin/admin.php');
  }
 }
}
?>