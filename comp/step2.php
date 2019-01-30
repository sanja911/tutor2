<!DOCTYPE html>
<?php
session_start();
include "koneksi.php";
//$_SESSION['username'])){
//}
/**/
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/bootstrap2.css" rel="stylesheet">

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/datepicker3.css" rel="stylesheet">
  <link href="../assets/css/styles.css" rel="stylesheet">
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery.form.js"></script>
<script>
$(document).ready(function() {
    var progressbar     = $('.progress-bar');
    $(".upload-image").click(function(){
        $(".form-horizontal").ajaxForm({
     target: '.preview',
     beforeSend: function() {
    $(".progress").css("display","block");
     progressbar.width('0%');
     progressbar.text('0%');
                },
      uploadProgress: function (event, position, total, percentComplete) {
       progressbar.width(percentComplete + '%');
       progressbar.text(percentComplete + '%');
   },
  }).submit();
    });
});
</script>
</head>
<body>
<div class="row">
  <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-md-offset-2 col-lg-7 col-md-offset-4 main">
    <h1 class="page-header" align="center">Register <?php echo $_SESSION ['username'];?></h1>
    <div class="login-panel panel panel-default">
      <div class="panel-heading tabs">
        <ul class="nav nav-pills">
          <li class="col-md-5"><a href="#" data-toggle="tab" align="center">Langkah 1</a></li>
          <li class="active col-md-5"><a href="#" data-toggle="tab" align="center">Langkah 2</a></li>
        </ul></div>
        <div class="panel-body">
          <form action="uploadpros.php" enctype="multipart/form-data" class="form-horizontal" method="post">
            <div class="preview" style="margin-bottom:20px;"></div>
            <div class="progress" style="display:none">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"> 0% </div>
            </div>
            <input type="file" name="file" class="form-control" />
            <button class="btn btn-primary upload-image" style="margin-top:20px;" name="upload">Upload Image</button>
          </form>
        </div>
      </div>
    </body>
</html>
