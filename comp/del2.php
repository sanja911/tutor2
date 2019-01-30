<?php
session_start();
include "koneksi.php";
$id	= $_GET['id'];
$hapus=mysql_query("SELECT * FROM ambil_mapel WHERE id='$id'");
$r=mysql_fetch_array($hapus);
if($hapus2 = mysql_query ("DELETE FROM ambil_mapel WHERE id='$id'")){
header("Location: ../tutor/data.php");

}
die ("Terdapat Kesalahan : ".mysql_error());

?>
