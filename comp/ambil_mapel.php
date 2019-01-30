<?php
	session_start();
	include "koneksi.php";

	$sql1 = "select * from user where username='$_SESSION[username]'";
	$hasil1 = mysql_query($sql1);
	$data1  = mysql_fetch_array($hasil1);
	$mapel=$_POST['mapel'];
	for($i=0;$i<count($mapel);$i++)
	{
	 if($mapel[$i]!="")
	 {
		 $cek = mysql_num_rows(mysql_query("SELECT * FROM ambil_mapel WHERE mapel='$mapel[$i]' and id_user='$data1[id_user]'"));
    if ($cek > 0){
    echo "<script>window.alert('Mapel Sudah Diambil ! Pilih Mapel Lain')
    window.location='../tutor/data.php'</script>";
	}else{
		$kueri= "SELECT max(id) as maxKode FROM ambil_mapel";
		$final = mysql_query($kueri);
		$result  = mysql_fetch_array($final);
		$kodeBarang = $result['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "0";
		$newID = $char . sprintf("%03s", $noUrut);
		$sql = "select * from mapel where mapel='$mapel[$i]'";
	 	$hasil = mysql_query($sql);
	 	$data  = mysql_fetch_array($hasil);
		 $sql= mysql_query("INSERT INTO ambil_mapel VALUES ('$newID','$data[id_mapel]','$data1[id_user]','$mapel[$i]')");
	 }
	 }
	}

	if ($sql){
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../tutor/data.php">';
	    } else {
	        		echo "Error!" .mysql_error();
				}
	        exit;


?>
