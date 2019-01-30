<?php
session_start();
include "koneksi.php";
if(isset($_POST['submit_row']))
{
$query  = "SELECT * FROM user where username='$_SESSION[username]'";
$hasil  = mysql_query($query);
$jumlah = mysql_fetch_assoc($hasil);
$query1  = "SELECT * FROM kriteria where id_user='$jumlah[id_user]'";
$hasil1  = mysql_query($query1);
$jumlah1 = mysql_fetch_assoc($hasil1);
$id_user		= $jumlah['id_user'];
$prestasi		= $_POST['prestasi'];
$lulusan    = $_POST['lulusan'];
$universitas= $_POST['universitas'];
$qualifikasi= $_POST['qualifikasi'];
$jumlah = count($lulusan);
for($i=0;$i<count($prestasi);$i++)
  {
    $sql=mysql_query("INSERT INTO prestasi values ('$id_user','$prestasi[$i]','$lulusan[$i]','$universitas[$i]','$qualifikasi[$i]')");
  } 
}
if ($sql){
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/index.php">';
    }else {
      $_SESSION['pesan']="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Update gagal ! Silahkan hubungi administratorx <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
      ";
      header("location:../index.php");
			}
        exit;

?>
