
<?php
	session_start();
	include "../comp/koneksi.php";
	$id=$_GET['id'];
	$kelas=$_GET['kelas'];
	$mapel=$_GET['mapel'];
	$kueri= "SELECT max(id) as maxKode FROM ambil_tutor";
	$final = mysql_query($kueri);
	$result  = mysql_fetch_array($final);
	$kodeBarang = $result['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
	$noUrut = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
$char = "0";
$newID = $char . sprintf("%03s", $noUrut);
$sql = "select * from user where username='$_SESSION[username]'";
$hasil = mysql_query($sql);
$data  = mysql_fetch_array($hasil);
$sql1 = "select kuota from kelas where id_kelas='$kelas'";
$hasil1 = mysql_query($sql1);
$data1  = mysql_fetch_array($hasil1);
$kuota = $data1['kuota'];
$kueri = "select * from ambil_mapel where id_mapel='$mapel'";
$ex = mysql_query($kueri);
$outp  = mysql_fetch_array($ex);

$query = mysql_query ("SELECT * FROM user INNER JOIN kelas ON user.id_user = kelas.id_tutor INNER JOIN mapel ON kelas.id_mapel=mapel.id_mapel where user.id_user='$data1[id_user]' order by user.id_user ASC");
$ar = mysql_fetch_array ($query);    
$cek1 = mysql_num_rows(mysql_query("SELECT * FROM ambil_tutor WHERE id_mapel='$mapel' and id_user='$data[id_user]'"));
$cek2 = mysql_num_rows(mysql_query("SELECT * FROM ambil_tutor WHERE id_kelas='$kelas' and id_user='$data[id_user]'"));
$sql3 = "SELECT count(id_kelas) as jumlah FROM ambil_tutor where id_kelas='$kelas'";
$query3 = mysql_query($sql3);
$result = mysql_fetch_array($query3);
$total=$result['jumlah'];
if ($cek2 > 0 ){
echo "<script>window.alert('Kelas sudah dipilih')
window.location='../user/dashboard.php'</script>";
}if ($cek1 > 1){
echo "<script>window.alert('Pilih Mapel Lain')
window.location='../user/dashboard.php'</script>";
}if($total == $kuota){
	echo "<script>window.alert('Kuota Penuh')
	window.location='../user/dashboard.php'</script>";

}else{
$sql= mysql_query("INSERT INTO ambil_tutor VALUES ('$newID','$data[id_user]','$id','$mapel','$kelas')");
	if ($sql){
		$_SESSION['sukses']="<div class='alert bg-info' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Tambah Mapel Sukses  <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a></div>";
		header("location:dashboard.php");
	    } else {
	        		echo "Error!" .mysql_error();
				}
	        exit;
}
?>
