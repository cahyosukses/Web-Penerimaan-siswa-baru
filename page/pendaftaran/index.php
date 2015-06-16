<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
	$status_home = null;
	$status_pendaftaran = "active";
	$status_infrmasi=null;
	$status_hasil=null;
	$status_siswabaru=null;
	$status_login = null;
	
	//$_SESSION['login_setup'] = NULL;
	
	$page_title = "Pendaftaran";
	include $path . "/page/header.php";
	?>
<hr>
                <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
    <p align="center"><strong>Formulir Pendaftaran Calon Siswa Baru Tahun Pelajaran 2015/2016</strong></p>
	<p align="center"><strong>SMK Negeri 3 Kota Cilegon</strong></p>
    <form name="input_data" action="cekpendaftaran.php" method="post">
    <table width="600" border="0">
	<tr>
        <td colspan="6"><strong>Keterangan Tentang Data Diri Calon Siswa</strong></td>
      </tr>
      <tr>
        <td width="12"></td>
        <td width="202">NISN</td>
        <td width="6"> : </td>
        <td width="312"><input type="text" style="height:40px;" name="NISN" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Nama Lengkap</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="nama" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Jenis Kelamin</td>
        <td> : </td>
        <td><input type="radio" name="jenis_kelamin" value="laki-laki" /> laki-laki <input type="radio" name="jenis_kelamin" value="perempuan" /> perempuan </td>
      </tr>
      <tr>
        <td></td>
        <td>Tempat/Tanggal Lahir</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="tempat_lahir" required="required" /> / </td><td><input type="date" style="height:40px;" name="tgl_lahir" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Agama</td>
        <td> : </td>
        <td><select name="agama">
					<option>- Pilih -</option>
					<option>Islam</option>
					<option>Kristen</option>
					<option>Budha</option>
                    <option>Hindu</option>
					<option>Lainnya</option></select></td>
      </tr>
      <tr>
        <td></td>
        <td>Kewarganegaraan</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="kewarganegaraan" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Anak Ke</td>
        <td> : </td>
        <td><select name="anak_ke">
					<option>- Pilih -</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
                    <option>4</option>
					<option>5</option>
					<option>6</option>
                    <option>7</option>
					<option>8</option>
					<option>9</option>
                    <option>10</option>
					<option>11</option>
					<option>12</option>
                    <option>13</option>
					<option>14</option>
					<option>15</option>
                    <option>16</option>
					<option>17</option>
					<option>18</option>
                    <option>19</option>
					<option>20</option></select></td>
      </tr>
      <tr>
        <td></td>
        <td>Jumlah Saudara</td>
        <td> : </td>
        <td><select name="jumlah_saudara">
					<option>- Pilih -</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
                    <option>4</option>
					<option>5</option>
					<option>6</option>
                    <option>7</option>
					<option>8</option>
					<option>9</option>
                    <option>10</option>
					<option>11</option>
					<option>12</option>
                    <option>13</option>
					<option>14</option>
					<option>15</option>
                    <option>16</option>
					<option>17</option>
					<option>18</option>
                    <option>19</option>
					<option>20</option></select>
           </td>
      </tr>
      <tr>
        <td colspan="4"><strong>Tempat Tinggal</strong></td>
      </tr>
       <tr>
        <td></td>
        <td>Alamat Lengkap</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="alamat_lengkap" required="required" /></td>
      </tr>
       <tr>
        <td></td>
        <td>Nomor Telepon</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="nomor_tlp" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Tinggal Dengan</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="tinggaldengan" required="required" /></td>
      </tr>
       <tr>
        <td></td>
        <td>Golongan Darah</td>
        <td> : </td>
        <td><select name="gol_darah">
					<option>- Pilih -</option>
					<option>A</option>
					<option>B</option>
					<option>AB</option>
                    <option>O</option></select></td>
       <tr>
        <td colspan="4"><strong>Keterangan Pendidikan</strong></td>
      </tr>
      <tr>
      <td></td>
        <td> Asal Sekolah</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="asal_sekolah" required="required" /></td>
      </tr>
      <tr>
      <td></td>
        <td>Kota</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="kota" required="required" /></td>
      </tr>
	   <tr>
      <td></td>
        <td>Kabupaten</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="kabupaten" required="required" /></td>
      </tr>
      <tr>
      <td></td>
        <td>Tahun Lulus</td>
        <td> : </td>
        <td><input type="text" style="height:40px;" name="tahun_lulus" required="required" /></td>
      </tr>
      <tr>
        <td></td>
        <td>Jurusan Yang Dipilih</td>
        <td> : </td>
        <td><input type="radio" name="jurusan" value="UPW" />Usaha Perjalanan Wisata</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="radio" name="jurusan" value="TB" />Patiseri (Tata Boga)</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="radio" name="jurusan" value="BB" />Busana Butik (Tatat Busana)</td>
      </tr>
	<tr>
	
	 <td></td>&nbsp;
	<td><button type="button" class="btn btn-success">Daftar</button>&nbsp;<button type="button" class="btn btn-success">Batal</button></td>
	</tr>
      
 
     </table>
	 </form>


	<?php include $path . "/page/footer.php"
	?>