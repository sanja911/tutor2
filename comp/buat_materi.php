<?php
	session_start();
	include "koneksi.php";
	if(!isset($_SESSION['username'])){
		die("Anda belum login");//jika belum login jangan lanjut..
		}
		
		if($_SESSION['akses']!="Tutor"){
		die("Anda bukan tutor");//jika bukan admin jangan lanjut
		}
	$query  = "SELECT * FROM user where username='$_SESSION[username]'";
	$hasil  = mysql_query($query);
	$out = mysql_fetch_assoc($hasil);
	$id_kelas=$_POST['id_kelas'];
	$id_tutor = $out['id_user'];
	$id_mapel = $_POST['id_mapel'];
	$kueri= "SELECT max(id) as maxKode FROM materi";
	$final = mysql_query($kueri);
	$result  = mysql_fetch_array($final);
	$kodeBarang = $result['maxKode'];
	$noUrut = (int) substr($kodeBarang, 3, 3);
	$noUrut++;
	$char = "0";
	$newID = $char . sprintf("%03s", $noUrut);
	$ekstensi_diperbolehkan	= array('pdf','docx','pptx');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 20044070){			
					move_uploaded_file($file_tmp, 'dok/'.$nama);
	$judul=$_POST['judul'];
	$materi=mysql_real_escape_string($_POST['materi']);
	$sql= mysql_query("INSERT INTO materi VALUES ('$newID','$id_kelas','$id_mapel','$id_tutor','$judul','$materi','$nama')");
		if ($sql){
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
	    } else {
	        		echo "Error!" .mysql_error();
				}
	        exit;
			}
		}

?>
