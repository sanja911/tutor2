
<?php
	session_start();
	include "koneksi.php";
	//cek apakah user sudah login
	if(!isset($_SESSION['username'])){
	die("Anda belum login");//jika belum login jangan lanjut..
	}
	if($_SESSION['akses']!="Siswa"){
	die("Anda bukan tutor");//jika bukan admin jangan lanjut
	}
	$id_tutor=$_GET['id_user'];
	$sql = "select * from user where username='$_SESSION[username]'";
	$hasil = mysql_query($sql);
	$data  = mysql_fetch_array($hasil);
	$sql= mysql_query("INSERT INTO ambil_tutor VALUES ('$data[id_user]','$id_tutor')");
	if ($sql){
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/">';
	    } else {
	        		echo "Error!" .mysql_error();
				}
	        exit;


?>
