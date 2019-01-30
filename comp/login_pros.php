<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];
if($op=="in"){
    $sql = mysql_query("SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysql_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $qry = mysql_fetch_array($sql);
        $_SESSION['username'] = $qry['username'];
        $_SESSION['nama'] = $qry['nama'];
        $_SESSION['akses'] = $qry['akses'];
        if($qry['akses']=="Tutor"){
            header("location:../tutor/index.php");
        }
        else if($qry['akses']=="Siswa"){
            header("location:../user/dashboard.php");
        }
    }else{
				$_SESSION['pesan']="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Username dan password tidak cocok atau belum terdaftar <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>
				";
				header("location:../index.php");
        }
}else if($op=="out"){
    unset($_SESSION['username']);
    unset($_SESSION['akses']);
    header("location:../index.php");
}
?>
