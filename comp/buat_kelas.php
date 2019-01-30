<?php
	session_start();
	include "koneksi.php";

	$id_kelas=$_POST['id_kelas'];
	$id_tutor = $_POST['id_tutor'];
	$id_mapel = $_POST['id_mapel'];
	$kuota  = $_POST['kuota'];
	$kueri= "SELECT max(id) as maxKode FROM kelas";
	$final = mysql_query($kueri);
	$result  = mysql_fetch_array($final);
	$kodeBarang = $result['maxKode'];
	$noUrut = (int) substr($kodeBarang, 3, 3);
	$noUrut++;
	$char = "0";
	$newID = $char . sprintf("%03s", $noUrut);
	$sql= mysql_query("INSERT INTO kelas VALUES ('$newID','$id_kelas','$id_tutor','$id_mapel','$kuota')");
		if ($sql){
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/kelas.php">';
	    } else {
	        		echo "Error!" .mysql_error();
				}
	        exit;


?>
