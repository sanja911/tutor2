<?php
session_start();
include "koneksi.php";
$id	= $_GET['id'];
$hapus=mysql_query("SELECT * FROM ambil_tutor WHERE id='$id'");
$r=mysql_fetch_array($hapus);
if($hapus2 = mysql_query ("DELETE FROM ambil_tutor WHERE id='$id'")){
header("Location: ../user/dashboard.php");

}
die ("Terdapat Kesalahan : ".mysql_error());

?>
