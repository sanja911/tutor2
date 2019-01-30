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
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="data.php"><em class="fa fa-calendar">&nbsp;</em> Data</a></li>
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
        <li class="active">Ambil Mapel</li>
      </ol>
    </div><!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
      </div>
    </div><!--/.row-->
    <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
              Data Tutor
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
          <form class="form-horizontal" role="search" method="post" action="data.php?cari-akun">
           <div class="col-md-10">
            <div class="form-group">
              <select id="mapel" name="mapel" class="form-control">
                  <option value=""></option>
            <?php
                  $sql = mysql_query("SELECT * FROM mapel ORDER BY id_mapel ASC");
                    while($data = mysql_fetch_array($sql)){
                ?>
              <option value="<?php echo $data['mapel'];?>"><?php echo $data['mapel']; ?></option>
                <?php
                }
                ?>
             </select>
            </div>
          </div>

        <div class="panel panel-default">
	<div class="panel-heading"></div>
	    <div class="panel-body">
               <div class="row"> 
                    <div class="col-md-3">
						<label>
					Jenis Kelamin
          </label>
                    <select id="jk" name="jenis_kel" class="form-control" >
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-Laki</option> 
                    </select>
				</div>
                <div class="col-md-3">
					<label>
					Umur
           </label>
                    <select id="umur" name="umur_min" class="form-control" >
                        <option value="20">20</option> 
                        <option value="25">25</option>
                    </select>
                    <select id="umur1" name="umur_max" class="form-control" >
                        <option value="26">26 </option> 
                        <option value="40">40  </option>
                    </select>
                </div>
                
                </div>
                <div class="row">
                <div class="col-md-3">
					<label>
					Prestasi</label>
                    <select id="pr" name="prestasi" class="form-control" >
                    <option value="luar negeri">Luar Negeri</option>
                    <option value="dalam negeri">Dalam Negeri</option>
                    
                   </select>
                </div>
                <div class="col-md-3">
					<label>
						Lulusan
                      </label>
                      <select id="lulus" name="lulusan" class="form-control" >
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                 </select>
              </div>
              <div class="col-md-3">
				 <label>Universitas</label>
                 <select id="univ" name="universitas" class="form-control" >
                 <option value="dalam negeri">Dalam Negeri </option>
                 <option value="luar negeri">Luar Negeri</option>
                </select>
              </div>
              <div class="col-md-3">
                <label>Qualifikasi</label>
                 <select id="qua" name="qualifikasi" class="form-control" >
                 <option value="tersertifikasi">Tersertifikasi</option>
                 <option value="non-sertifikasi">Non Sertifikasi</option>
                   
                   </select>
			</div>
            </div>
            </br>
            <button type="submit" class="btn btn-info" name="submit_row">Cari Mapel</button>
        </form><br></div></div>
        <?php
				if(isset($_GET['cari-akun'])) {
				include "../comp/cari-akun.php";
				}
				?>

            </div>
          </div>
        </div>
      </div>
  </div>

  <!--   
  <script>
    $(function () {
    // Data Table
      $("#data").dataTable({
    scrollX: true
  });
    });
  </script>Core JS Files   -->
  <script>
    $(document).ready(function () {
    $("#mapel").select2({
    placeholder: "Please Select"
      });
      });
  </script>
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
       $("#umur1").select2({
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
