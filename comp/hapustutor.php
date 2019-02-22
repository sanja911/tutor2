<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
  }
    
if($_SESSION['akses']!="Siswa"){
die("Anda bukan tutor");//jika bukan admin jangan lanjut
}
$id	= $_GET['id'];
$query  = "SELECT * FROM user where username='$_SESSION[username]'";
$hasil  = mysql_query($query);
$out = mysql_fetch_assoc($hasil);
$hapus=mysql_query("SELECT * FROM ambil_tutor WHERE id_kelas='$id' and id_user='$out[id_user]'");
$r=mysql_fetch_array($hapus);
if($hapus2 = mysql_query ("DELETE id_user FROM ambil_tutor WHERE id_kelas='$id' and id_user='$out[id_user]'")){
header("Location: ../user/kelas.php");

}
die ("Terdapat Kesalahan : ".mysql_error());

?>
