<?php
include "koneksi.php";
session_start();
$nama_depan		= $_POST['nama_depan'];
$nama_belakang= $_POST['nama_belakang'];
$username			= $_POST['username'];
$email 				= $_POST['email'];
$password			= $_POST['password'];
$tgl_lahir		= $_POST['tgl_lahir'];
$awal         = $_POST['awal'];
$akhir        = $_POST['akhir'];
$date 		    = date('Y-m-d', strtotime($tgl_lahir));
$rubah 				= date_format(date_create($tgl_lahir), 'Y');
$thn_skrg 		= date('Y');
$date1 		    = date('Y-m-d', strtotime($awal));
$rubah1 			= date_create($awal);
$date2 		    = date('Y-m-d', strtotime($akhir));
$rubah2 			= date_create($akhir);
$usia 				= $thn_skrg - $rubah;
$lama_mengajar= date_diff($rubah2,$rubah1);
$query 				= "SELECT max(id_user) as maxKode FROM user where id_user like 'T%'";
$hasil 				= mysql_query($query);
$data 				= mysql_fetch_array($hasil);
$kodeUser	 		= $data['maxKode'];
$noUrut 			= (int) substr($kodeUser, 3, 3);
$noUrut++;
$char 				= "T";
$kodeUser 		= $char . sprintf("%03s", $noUrut);
$jenis_kel		= $_POST['jenis_kel'];
$alamat       = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$link_tutor   = $_POST['link_tutor'];
$sql= mysql_query("INSERT INTO user (id_user,nama_lengkap,username,email,tempat_lahir,tgl_lahir,jenis_kel,password,foto,akses) VALUES ('$kodeUser','$nama_depan $nama_belakang','$username','$email','$tempat_lahir','$date','$jenis_kel','$password','','Tutor')");
$sql2=mysql_query("INSERT INTO kriteria (id_user,umur,prestasi,jenis_kel,lama_mengajar,alamat,link,awal,akhir) values ('$kodeUser','$usia','','$jenis_kel','$lama_mengajar->y','$alamat','$link_tutor','$awal','$akhir')");
if ($sql.$sql2){
  $sql3 = mysql_query("SELECT * FROM user WHERE username='$username'");
      $qry = mysql_fetch_array($sql3);
      $_SESSION['username'] = $qry['username'];
          header("location:step2.php");


}else {
        		echo "Error!" .mysql_error();
			}

      exit;

?>
