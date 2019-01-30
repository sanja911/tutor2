<?php
session_start();
include "../comp/koneksi.php";
if(isset($_POST['submit_row']))
{
$query  = "SELECT * FROM user where username='$_SESSION[username]'";
$hasil  = mysql_query($query);
$jumlah = mysql_fetch_assoc($hasil);
$query1  = "SELECT * FROM kriteria where id_user='$jumlah[id_user]'";
$hasil1  = mysql_query($query1);
$jumlah1 = mysql_fetch_assoc($hasil1);
$id_user		= $jumlah['id_user'];
$nama_lengkap		= $_POST['nama_lengkap'];
$email			= $_POST['email'];
$password 		= $_POST['password'];
$tgl_lahir		= $_POST['tgl_lahir'];
$awal         = $_POST['awal'];
$akhir        = $_POST['akhir'];
$date1 		    = date('Y-m-d', strtotime($awal));
$rubah1 			= date_create($awal);
$date2 		    = date('Y-m-d', strtotime($akhir));
$rubah2 			= date_create($akhir);
$lama_mengajar= date_diff($rubah2,$rubah1);
$tempat_lahir = $_POST['tempat_lahir'];
$link_tutor   = $_POST['link_tutor'];
$date 		    = date('Y-m-d', strtotime($tgl_lahir));
$rubah 				= date_format(date_create($tgl_lahir), 'Y');
$thn_skrg 		= date('Y');
$usia 				= $thn_skrg - $rubah;
$alamat       = $_POST['alamat'];
}
$sql= mysql_query("UPDATE user SET nama_lengkap='$nama_lengkap', email='$email',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',password='$password' WHERE id_user='$jumlah[id_user]'");
$sql2=mysql_query("UPDATE kriteria SET umur='$usia', lama_mengajar='$lama_mengajar->y',alamat='$alamat',link='$link_tutor',awal='$date1',akhir='$date2' WHERE id_user='$jumlah[id_user]'");

if ($sql.$sql2){
  $_SESSION['sukses']="<div class='alert bg-teal' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Update Sukses ! <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
  ";
  header("location:user.php");
  }else {
    $_SESSION['error']="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Update gagal! Lengkapi form dahulu <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
    ";
    header("location:user.php");
        		echo "Error!" .mysql_error();
			}
        exit;


?>
