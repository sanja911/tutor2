<?php
session_start();
include "../comp/koneksi.php";

if(isset($_SESSION['error'])){
 echo $_SESSION['error'];
 unset($_SESSION['error']);
}
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

if($_SESSION['akses']!="Siswa"){
die("Anda bukan siswa");//jika bukan admin jangan lanjut
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengaturan</title>
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	  <?php
		$query  = "SELECT * FROM user where username='$_SESSION[username]'";
		$hasil  = mysql_query($query);
		$jumlah = mysql_fetch_assoc($hasil);
		$query1  = "SELECT * FROM kriteria where id_user='$jumlah[id_user]'";
		$hasil1  = mysql_query($query1);
		$jumlah1 = mysql_fetch_assoc($hasil1);
		?>
    <div id="ModalDel" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                <div class="panel panel-danger">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <div class="panel-heading">Danger Panel</div>
                </div>
                <div class="panel-body">
      						<p>Data Tidak Dapat Dihapus Tanpa Persetujuan Admin. Silahkan Hubungi Admin Untuk Menghapus Data Ini.</p>
      					</div>
      				</div>
            </div>
          </div>

      </div>
  </div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span></button>
  				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
  				<ul class="nav navbar-top-links navbar-right">
  					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
  						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
  					</a>
  						<ul class="dropdown-menu dropdown-messages">
  							<li>
  								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
  									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
  									</a>
  									<div class="message-body"><small class="pull-right">3 mins ago</small>
  										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
  									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
  								</div>
  							</li>
  							<li class="divider"></li>
  							<li>
  								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
  									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
  									</a>
  									<div class="message-body"><small class="pull-right">1 hour ago</small>
  										<a href="#">New message from <strong>Jane Doe</strong>.</a>
  									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
  								</div>
  							</li>
  							<li class="divider"></li>
  							<li>
  								<div class="all-button"><a href="#">
  									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
  								</a></div>
  							</li>
  						</ul>
  					</li>
  					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
  						<em class="fa fa-bell"></em><span class="label label-info">5</span>
  					</a>
  						<ul class="dropdown-menu dropdown-alerts">
  							<li><a href="#">
  								<div><em class="fa fa-envelope"></em> 1 New Message
  									<span class="pull-right text-muted small">3 mins ago</span></div>
  							</a></li>
  							<li class="divider"></li>
  							<li><a href="#">
  								<div><em class="fa fa-heart"></em> 12 New Likes
  									<span class="pull-right text-muted small">4 mins ago</span></div>
  							</a></li>
  							<li class="divider"></li>
  							<li><a href="#">
  								<div><em class="fa fa-user"></em> 5 New Followers
  									<span class="pull-right text-muted small">4 mins ago</span></div>
  							</a></li>
  						</ul>
  					</li>
  				</ul>
  			</div>
  		</div><!-- /.container-fluid -->
  	</nav>

  	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  		<div class="profile-sidebar">
  			<div class="profile-userpic">
  			<a href="#" data-toggle="modal" data-target="#ModalFoto"><img src="../comp/foto/<?php echo $jumlah['foto'];?>" class="img-responsive" alt=""></a>
  			</div>
  			<div class="profile-usertitle">
  				<div class="profile-usertitle-name"><?php echo $_SESSION['username'];?></div>
  				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
  			</div>
  			<div class="clear"></div>
  		</div>
      	<ul class="nav menu">
      			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      			<li><a href="data.php"><em class="fa fa-calendar">&nbsp;</em> Data</a></li>
      			<li class="active"><a href="user.php"><em class="fa fa-cog">&nbsp;</em> Pengaturan</a></li>
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
          }
          ?>
          <li class="active">Pengaturan Akun</li>
        </ol>
      </div>

    <div class="panel panel-default">
      <div class="panel-heading">Pengaturan Akun</div>
      <div class="panel-body">
          <form action="edit.php" method="post">
                  <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                          <label class="bmd-label-floating">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" value="<?php echo $jumlah['nama_lengkap'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" value="<?php echo $jumlah['email'];?>" class="form-control">
                        </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" value="<?php echo $jumlah['username'];?>" class="form-control" disabled>
                        </div>
                      </div>
                        <div class="col-md-6">

                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" value="<?php echo $jumlah['password'];?>" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                       <div class="form-group">
                          <label class="bmd-label-floating">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" value="<?php echo $jumlah['tempat_lahir']; ?>" class="form-control" required>
                        </div>
                      </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" value="<?php echo $jumlah['tgl_lahir']; ?>" class="form-control">
                        </div>
                      </div>
                    </div>
                      <div class="form-group" align="center">
											<button type="submit" name="submit_row" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                        </div>

                  </form>

                </div>
                </div>

                <div id="ModalFoto" class="modal fade" role="dialog">
                		<div class="modal-dialog">
                			<!-- konten modal-->
                			<div class="modal-content">
                				<!-- heading modal -->
                				<div class="modal-header">
                          <div class="panel-body">Ubah Foto Profil
                            <form action="../comp/upload.php" enctype="multipart/form-data" class="form-horizontal" method="post">
                              <div class="preview" style="margin-bottom:20px;"></div>
                              <div class="progress" style="display:none">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0% </div>
                              </div>
                              <input type="file" name="file" class="form-control" />
                              <button class="btn btn-primary upload-image" style="margin-top:20px;" name="upload">Upload Image</button>
                            </form>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>
              <script src="../assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
            	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
            	<script src="../assets/js/chart.min.js" type="text/javascript"></script>
            	<script src="../assets/js/chart-data.js" type="text/javascript"></script>
            	<script src="../assets/js/easypiechart.js" type="text/javascript"></script>
            	<script src="../assets/js/easypiechart-data.js" type="text/javascript"></script>
            	<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>
            	<script src="../assets/js/custom.js" type="text/javascript"></script>

</body>

</html>
