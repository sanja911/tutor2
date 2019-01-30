<?php
session_start();
include "koneksi.php";

$query  = "SELECT * FROM user where username='$_SESSION[username]'";
$hasil  = mysql_query($query);
$jumlah = mysql_fetch_assoc($hasil);
$query1  = "SELECT * FROM kriteria where id_user='$jumlah[id_user]'";
$hasil1  = mysql_query($query1);
$jumlah1 = mysql_fetch_assoc($hasil1);
$sql3 = "SELECT count(id_tutor) AS jumlah FROM ambil_tutor where id_kelas='$ar[id_kelas]'";
$query3 = mysql_query($sql3);
$result = mysql_fetch_array($query3);
$total   = $result['jumlah'];
$sql2=mysql_query("UPDATE kriteria SET prestasi='$total' WHERE id_user='$jumlah[id_user]'");
if ($sql2){
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/index.php">';
    }else {
      $_SESSION['pesan']="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Update gagal ! Silahkan hubungi administratorx <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
      ";
      header("location:../tutor/index.php");
			}
        exit;

?>
