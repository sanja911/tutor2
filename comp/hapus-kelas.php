<?php
session_start();
include "koneksi.php";
$id	= $_GET['id'];
$hapus=mysql_query("SELECT * FROM ambil_tutor JOIN kelas ON ambil_tutor.id_kelas=kelas.id_kelas WHERE ambil_tutor.id_kelas='$id'");
$r=mysql_fetch_array($hapus);
if($hapus2 = mysql_query ("DELETE FROM kelas WHERE id_kelas='$id'")){
    if($hapus2 = mysql_query ("DELETE FROM ambil_tutor WHERE id_kelas='$id'")){
    header("Location: ../tutor/kelas.php");
    }
}
die ("Terdapat Kesalahan : ".mysql_error());

?>
