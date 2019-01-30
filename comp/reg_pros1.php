<?php
include "koneksi.php";
session_start();
$nama_depan		= $_POST['nama_depan'];
$nama_belakang= $_POST['nama_belakang'];
$username			= $_POST['username'];
$email 				= $_POST['email'];
$password			= $_POST['password'];
$tgl_lahir		= $_POST['tgl_lahir'];
$tempat_lahir = $_POST['tempat_lahir'];
$date 		    = date('Y-m-d', strtotime($tgl_lahir));
$query 				= "SELECT max(id_user) as maxKode FROM user where id_user like 'U%'";
$hasil 				= mysql_query($query);
$data 				= mysql_fetch_array($hasil);
$kodeUser	 		= $data['maxKode'];
$noUrut 			= (int) substr($kodeUser, 3, 3);
$noUrut++;
$char 				= "U";
$kodeUser 			= $char . sprintf("%03s", $noUrut);
$jenis_kel			= $_POST['jenis_kel'];
$sql= mysql_query("INSERT INTO user (id_user,nama_lengkap,username,email,tempat_lahir,tgl_lahir,jenis_kel,password,foto,akses) VALUES ('$kodeUser','$nama_depan $nama_belakang','$username','$email','$tempat_lahir','$date','$jenis_kel','$password','','Siswa')");
if ($sql){
  $sql2 = mysql_query("SELECT * FROM user WHERE username='$username'");
      $qry = mysql_fetch_array($sql2);
      $_SESSION['username'] = $qry['username'];
          header("location:step2.php");
    } else {
      $_SESSION['pesan']="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Username sudah terdaftar <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
      ";
      header("location:reg_user.php");
			}
        exit;


?>
