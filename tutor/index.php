<?php
session_start();
include "../comp/koneksi.php";
//cek apakah user sudah login
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

if($_SESSION['akses']!="Tutor"){
die("Anda bukan tutor");//jika bukan admin jangan lanjut
}
$sql = "select * from user where username='$_SESSION[username]'";
      $hasil = mysql_query($sql);
      $data  = mysql_fetch_array($hasil);
      $sql1 = mysql_query("select * from prestasi where id_user='$data[id_user]'");
      if (mysql_num_rows($sql1) == 0) {
				header("location:prestasi.php");
			}
?>
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Halaman Tutor</title>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
<link href="../assets/css/datepicker3.css" rel="stylesheet">
<link href="../assets/css/styles.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
<script type="text/javascript" src="clone-form-td.js"></script>  

<script src="../assets/aset/plugins/select2/select2.full.min.js"></script>
</head>
<body>
<?php
      
			?>
  
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Halaman</span>Tutor</a>
				<ul class="nav navbar-top-links navbar-right">
					</a>
						
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
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>id : <?php echo $out['id_user'];?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
			</li><li><a href="user.php"><em class="fa fa-cog">&nbsp;</em> Pengaturan</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->

    <?php
    $sql = "SELECT count(id_user) AS jumlah FROM ambil_tutor where id_tutor='$out[id_user]'";
    $query = mysql_query($sql);
    $result = mysql_fetch_array($query);
    $sql1 = "SELECT count(id_user) AS jumlah FROM ambil_mapel where id_user='$out[id_user]'";
    $query1 = mysql_query($sql1);
    $result1 = mysql_fetch_array($query1);
    $sql2 = "SELECT * from kriteria where id_user='$out[id_user]'";
    $query2 = mysql_query($sql2);
	$result2 = mysql_fetch_array($query2);
	$sql3 = "SELECT count(id_user) AS jumlah FROM prestasi where id_user='$out[id_user]'";
    $query3 = mysql_query($sql3);
    $result3 = mysql_fetch_array($query3);
    ?>
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Mapel Yang Diambil</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $result1['id_user'];?>" ><span class="percent"><?php echo $result1['jumlah'];?> %</span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Jumlah Siswa</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $result['jumlah'];?>" ><span class="percent"><?php echo $result['jumlah'];?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Prestasi Anda</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $result2['prestasi'];?>" ><span class="percent"><?php echo $result3['jumlah'];?></span></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Lama Mengajar</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $result2['lama_mengajar'];?>" ><span class="percent"><?php echo $result2['lama_mengajar'];?></span></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default chat">
					<div class="panel-heading">
						Siswa Anda
						<ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<ul>
              <?php
              $cek = mysql_num_rows(mysql_query("SELECT * FROM ambil_tutor WHERE id_tutor='$out[id_user]'"));
             if ($cek == 0){?>
               <li class="left clearfix"><span class="chat-img pull-left">

                 <div class="chat-body clearfix">
                   <div class="header"><strong class="primary-font">Masih Belum Memiliki Siswa</strong> <small class="text-muted"></small></div>
                </div>
               </li>
             </ul>
          </div>

        </div>
               <?php
         	}else{
              $query1  = "SELECT * FROM ambil_tutor where id_tutor='$out[id_user]'";
              $hasil1  = mysql_query($query1);
              $out1 = mysql_fetch_assoc($hasil1);
              $query = mysql_query ("SELECT * FROM user join ambil_tutor on user.id_user=ambil_tutor.id_user where user.id_user='$out1[id_user]'");
              while ($ar = mysql_fetch_array ($query)){
                $query2  = "SELECT * FROM mapel where id_mapel='$out1[id_mapel]'";
                $hasil2  = mysql_query($query2);
                $out2 = mysql_fetch_assoc($hasil2);

              ?>
							<li class="left clearfix"><span class="chat-img pull-left">
								<img src="http://placehold.it/60/30a5ff/fff" alt="User Avatar" class="img-circle" />
								</span>
								<div class="chat-body clearfix">
									<div class="header"><strong class="primary-font"><?php echo $ar['nama_lengkap']; ?></strong> (<?php echo $ar['email'];?>) <small class="text-muted"></small></div>
									<p><?php echo $ar['nama_lengkap'];?>,lahir di <?php echo $ar['tempat_lahir'],$ar['tgl_lahir'];?>. Mengambil mapel <?php echo $out2['mapel'];?></p>
								</div>
							</li>
							<?php }}?>
						</ul>
					</div>
					
				</div>
      

			</div><!--/.col-->


			<div class="col-md-6">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Petunjuk Penggunaan
						<ul class="pull-right panel-settings panel-button-tab-right">
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<div class="timeline-badge primary"><em class="glyphicon glyphicon-dashboard"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Menu Dashboard</h4>
									</div>
									<div class="timeline-body">
										<p>Menu yang berisi tentang halaman berada ketika sukses melakukan login</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-calendar"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Menu Data</h4>
									</div>
									<div class="timeline-body">
										<p>Berfungsi untuk menambah atau menghapus data matapelajaran yang diambil</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-cog"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Menu Pengaturan</h4>
									</div>
									<div class="timeline-body">
										<p>Berfungsi untuk melakukan konfigurasi pada akun,seperti perubahan username,password,dll</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge"><em class="fa fa-power-off"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Logout</h4>
									</div>
									<div class="timeline-body">
										<p>Berfungsi untuk keluar dari akun anda.</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div><!--/.col-->
			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.sanja.com">sanja</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
  <script src="../assets/js/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/jquery-1.11.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/chart.min.js"></script>
	<script src="../assets/js/chart-data.js"></script>
	<script src="../assets/js/easypiechart.js"></script>
	<script src="../assets/js/easypiechart-data.js"></script>
	<script src="../assets/js/bootstrap-datepicker.js"></script>
	<script src="../assets/js/custom.js"></script>
	<script src="../assets/aset/plugins/select2/select2.full.min.js"></script>

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

  <script src="../assets/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
    $("#jk").select2({
    width:"100%",  
    placeholder: "Pilih Jenis Kelamin"
      });
      $("#umur").select2({
    width:"100%",  
    placeholder: "Pilih Umur"
      });
      $("#pr").select2({
    width:"100%",  
    placeholder: "Pilih Prestasi"
      });
      $("#lulus").select2({
    width:"100%",  
    placeholder: "Pilih Lulusan"
      });
      $("#univ").select2({
    width:"100%",  
    placeholder: "Pilih Universitas"
      });
      $("#qua").select2({
    width:"100%",  
    placeholder: "Pilih Qualifikasi"
      });
      });
  </script>

</body>

</html>
