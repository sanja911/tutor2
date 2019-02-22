<?php
include "../comp/koneksi.php";
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

if($_SESSION['akses']!="Siswa"){
die("Anda bukan tutor");//jika bukan admin jangan lanjut
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <?php include "../comp/header.php";?>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Halaman</span>User</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									
			</div>
		</div><!-- /.container-fluid -->
	</nav>
  <?php
  $query  = "SELECT * FROM user where username='$_SESSION[username]'";
  $hasil  = mysql_query($query);
  $out = mysql_fetch_assoc($hasil);
  ?>
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
			<img src="../comp/foto/<?php echo $out['foto'];?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['username'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<ul class="nav menu">
			<li class="active"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
      <em class="fa fa-navicon">&nbsp;</em> Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="data.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Matkul
					</a></li>
					<li><a class="" href="kelas.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Kelas
					</a></li>

				</ul>
			<li><a href="user.php"><em class="fa fa-cog">&nbsp;</em> Pengaturan</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
        <?php
        if(isset($_SESSION['sukses'])){
         echo $_SESSION['sukses'];
         unset($_SESSION['sukses']);
       }?>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
    <?php
    $query  = "SELECT * FROM user where username='$_SESSION[username]'";
    $hasil  = mysql_query($query);
    $out = mysql_fetch_assoc($hasil);
    $query1  = "SELECT count(id_tutor) as Jumlah from ambil_tutor where id_user='$out[id_user]'";
    $hasil1  = mysql_query($query1);
    $out1    = mysql_fetch_array($hasil1);
    ?>
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
              Data Tutor
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
            <?php
            $query2  = "SELECT * FROM ambil_tutor where id_user='$out[id_user]'";
            $hasil2  = mysql_query($query2);
            $out2 = mysql_fetch_assoc($hasil2);
            $query = mysql_query("Select * from user JOIN kriteria ON user.id_user=kriteria.id_user JOIN kelas ON user.id_user=kelas.id_tutor where user.id_user='$out2[id_tutor]'");
        ?>
        <table id="data" class="table table-bordered table-striped table-scalable">
            <thead>
                <td class="text-center">ID</th>
                <td class="text-center">Username</th>
                <td class="text-center">Umur</th>
                <td class="text-center">Prestasi</th>
                <td class="text-center">Alamat</th>
                <td class="text-center">Kelas</th>
                <td class="text-center">Lama Mengajar</th>
            </thead>
            <tbody>
                <?php while($row = mysql_fetch_array($query)) {
                   $sql2 = "SELECT count(prestasi) AS jumlah FROM prestasi where id_user='$out2[id_tutor]'";
                   $query2 = mysql_query($sql2);
                   $result = mysql_fetch_array($query2);
                  ?>

                  <tr>
                        <td width="10%" class="text-center"><?php echo $row['id_tutor'] ?></td>
                        <td width="20%" class="text-center"><?php echo $row['username'] ?></td>
                        <td width="10%" class="text-center"><?php echo $row['umur'] ?></td>
                        <td width="10%" class="text-center"><?php echo $result['jumlah'] ?></td>
                        <td width="30%" class="text-center"><?php echo $row['alamat'] ?></td>
                        <td width="30%" class="text-center"><a href="kelas-view.php?id=<?php $row['id_kelas'];?>"><?php echo $row['id_kelas'] ?></a></td>
                        <td width="10%" class="text-center"><?php echo $row['lama_mengajar'] ?></td>

                    </tr>
            <?php } ?>
            </tbody>
        </table>

					</div>
				</div>
			</div>
		</div><!--/.row-->
    <div class="modal fade" id="hapus">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Apakah Anda Yakin Menghapus Mapel Ini? Semua data yang berhubungan dengan mapel ini akan dihapus,seperti data murid,dll.</h4>
          </div>
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
              Mapel Yang Telah Diambil
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
            <?php
            $query2  = "SELECT * FROM ambil_tutor where id_user='$out[id_user]'";
            $hasil2  = mysql_query($query2);
            $out2 = mysql_fetch_assoc($hasil2);
            $query3  = "SELECT * FROM ambil_mapel inner join user on ambil_mapel.id_user = user.id_user where user.id_user='$out2[id_tutor]'";
            $hasil3  = mysql_query($query3);
            $out3 = mysql_fetch_assoc($hasil3);
            $query = mysql_query("SELECT * FROM user INNER JOIN ambil_tutor ON user.id_user = ambil_tutor.id_user INNER JOIN mapel on mapel.id_mapel=ambil_tutor.id_mapel where ambil_tutor.id_user='$out[id_user]' order by user.id_user ASC");
            ?>
        <a href="data.php"><button class="btn btn-success" type="button" data-target="#myModal" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Mapel</button></a>
            <br></br>
        <table id="data2" class="table table-bordered table-striped table-scalable">
            <thead>
                <td class="text-center">No</th>
                <td class="text-center">Nama Tutor</th>
                  <td class="text-center">Mapel</th>
                  <td class="text-center">aksi</th>

            </thead>
            <tbody>
                <?php
                  $i=1;
                while($row = mysql_fetch_array($query)) {?>
                    <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo $out3['nama_lengkap'] ?></td>
                        <td class="text-center"><?php echo $row['mapel'] ?></td>
                        <td align="center"><?php echo "<a href='#' onClick='confirm_delete(\"../comp/hapus.php?id=$row[id]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>";?>
                      </td>
                    </tr>
            <?php $i++; } ?>
            </tbody>
        </table>

					</div>
				</div>
			</div>
		</div><!--/.row-->
    <?php include "modal.php";?>
    <div id="ModalAsk" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                <div class="panel panel-danger">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="panel-heading">Perhatian</div>
                </div>
                <div class="panel-body">
                  <p>Hanya Dapat Memilih 1 Tutor Saja. Untuk Menambah Tutor Yang Lain,Silahkan Hubungi Administrator.</p>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>

			<div class="col-sm-12">
				<p class="back-link">Created By<a href="https://www.medialoot.com">Sanja Avi</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
  <script src="../assets/js/jquery-1.11.1.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/chart.min.js"></script>
  <script src="../assets/js/chart-data.js"></script>
  <script src="../assets/js/easypiechart.js"></script>
  <script src="../assets/js/easypiechart-data.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/aset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/aset/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <script>
    $(function () {
    // Data Table
      $("#data").dataTable({
    scrollX: true
  });
    });
  </script>
  <script>
    $(function () {
    // Data Table
      $("#data2").dataTable({
    scrollX: true
  });
    });
  </script>
  <script>
    window.onload = function () {
  var chart1 = document.getElementById("line-chart").getContext("2d");
  window.myLine = new Chart(chart1).Line(lineChartData, {
  responsive: true,
  scaleLineColor: "rgba(0,0,0,.2)",
  scaleGridLineColor: "rgba(0,0,0,.05)",
  scaleFontColor: "#c5c7cc"
  });
};
  </script>
  <script>
		function confirm_delete(delete_url){
			$("#hapus").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>
</body>
</html>
