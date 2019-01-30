<?php
session_start();
include "koneksi.php";

if(isset($_POST['upload'])){
    $query1  = "SELECT * FROM user where username='$_SESSION[username]'";
    $hasil1 = mysql_query($query1);
    $jumlah1 = mysql_fetch_assoc($hasil1);
    $ekstensi_diperbolehkan	= array('png','jpg');
       $nama = $_FILES['file']['name'];
       $x = explode('.', $nama);
       $ekstensi = strtolower(end($x));
       $ukuran	= $_FILES['file']['size'];
       $file_tmp = $_FILES['file']['tmp_name'];
        $username=$_SESSION['username'];
       if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
         if($ukuran < 104407000){
           move_uploaded_file($file_tmp, 'foto/'.$nama);
           $query = mysql_query("UPDATE user SET foto='$nama' where username='$_SESSION[username]'");;
           if($query){
              $_SESSION['sukses']="<div class='alert bg-info' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Register Sukses, silahkan login dengan username dan password yang telah di daftarkan <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>";
              header("location:../index.php");
           }else{
             echo 'GAGAL MENGUPLOAD GAMBAR';
           }
         }else{
           echo 'UKURAN FILE TERLALU BESAR';
         }
       }else{
         echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
       }
     }
?>
