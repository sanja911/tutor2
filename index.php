<?php
session_start();
include "/comp/koneksi.php";
if(isset($_SESSION['pesan'])){
 echo $_SESSION['pesan'];
 unset($_SESSION['pesan']);
}
if(isset($_SESSION['sukses'])){
 echo $_SESSION['sukses'];
 unset($_SESSION['sukses']);
}
if(isset($_SESSION['akses']) == "Tutor"){
header("location: tutor/");
}else if(isset($_SESSION['akses']) == "Siswa"){
header("location: user/");
}else{

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
</head>

<body>
     <div class="row">
    	<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
   			<div class="login-panel panel panel-default">
   				<div class="panel-heading">Log in</div>
   				<div class="panel-body">
            <form role="form" action="comp/login_pros.php?op=in" method="post">
              <fieldset>
                <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                  <label class="bmd-label-floating">Username</label>
                <input type="text" name="username" class="form-control">
              </div>
						</div>
					 </div>
					  <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <input type="password" name="password" class="form-control">
              </div>
            </div>
            </div>
            <div class="row">
					    <div class="col-md-6">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
                  <div class="clearfix"></div>
					    </div>
						<div class="col-md-6">
				       <div class="form-group">
                        <button type="button" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#ModalReg">Register</button>
               </div>
						</div>
            </div>
					</div>
				  </form>
        </div>
      </div>


  <div id="ModalReg" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- konten modal-->
  			<div class="modal-content">
  				<!-- heading modal -->
  				<div class="modal-header">
            <div class="col-md-12">
      				<div class="panel panel-teal">
      					<div class="panel-heading dark-overlay">Register</div>
  				</div>
  				<!-- body modal -->
          <div class="panel-body">
            <p> Lakukan Registrasi terlebih dahulu sebelum login kadalam sistem !</p>
            <div class="row">
              <div class="col-md-5">
            <a href="reg_tutor.php" type="submit" class="btn btn-primary pull-right">Register Tutor</a>
            <div class="clearfix"></div>

  </div>
    <div class="col-md-5">
            <a href="reg_user.php" type="submit" class="btn btn-primary pull-right">Register User</a>
            <div class="clearfix"></div>
  </div></div>
  				<!-- footer modal -->
        </div>
      </div>
  			</div>
  		</div>
  	</div>
</div>

<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<?php } ?>
</body>

</html>
