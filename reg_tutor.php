<!DOCTYPE html>
<?php
include "comp/koneksi.php";
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lumino - Login</title>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/datepicker3.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
  <div class="row">
   <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-md-offset-2 col-lg-7 col-md-offset-4 main">
     <h1 class="page-header" align="center">Register Tutor</h1>
     <div class="login-panel panel panel-default">
       <div class="panel-heading tabs">
         <ul class="nav nav-pills">
          <li class="active col-md-5"><a href="#" data-toggle="tab" align="center">Langkah 1</a></li>
          <li class="col-md-5"><a href="#" data-toggle="tab" align="center">Langkah 2</a></li>
        </ul></div>
        <div class="panel-body">

                  <form method="post" id="login" action="comp/reg_pros.php" role="form">
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Depan</label>
                          <input type="text" name="nama_depan" class="form-control" required>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Belakang</label>
                          <input type="text" name="nama_belakang" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="username" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" class="form-control" required>
                        </div>
                      </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12">
                           <div class="form-group">
                             <label class="bmd-label-floating">Email</label>
                             <input type="email" name="email" class="form-control" required>
                           </div>
                         </div>
                    </div>
                    <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                      </div>
                    </div>

   					          <div class="col-md-6">
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="tgl_lahir" class="form-control" required>
                        </div>
                      </div>
					          </div>
                    <div class="row">
                    <div class="col-md-5">
                      <div class="form-group"><label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kel"  required>
                          <option selected disabled >Jenis Kelamin</option>
                          <option class="dropdown-item" value="L">Laki-Laki</option>
                          <option class="dropdown-item" value="P">Perempuan</option>
                       </select>
                      </div>
                    </div>
                  </div>
					           <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Awal Mengajar</label>
                          <input type="date" name="awal" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Terakhir kali Mengajar</label>
                          <input type="date" name="akhir" class="form-control" required>
                        </div>
                      </div>
					         </div>
                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tautan Khusus (Jika ada) ex: link akun edmodo,facebook,etc</label>
                          <input type="link" name="link_tutor" class="form-control">
                        </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating"> Alamat Lengkap.</label>
                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
                </div>
              </div>
            </div>

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>
