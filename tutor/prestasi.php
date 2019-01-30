<!DOCTYPE html>
<?php
session_start();
include "../comp/koneksi.php";
if(isset($_SESSION['sukses'])){
 echo $_SESSION['sukses'];
 unset($_SESSION['sukses']);
}
if(isset($_SESSION['error'])){
 echo $_SESSION['error'];
 unset($_SESSION['error']);
}
if(!isset($_SESSION['username'])){
die("Anda belum login");//jika belum login jangan lanjut..
}

if($_SESSION['akses']!="Tutor"){
die("Anda bukan tutor");//jika bukan admin jangan lanjut
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dynamically Duplicating a form, by Tristan Denyer</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	  <link href="../assets/css/datepicker3.css" rel="stylesheet">
	  <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <style>    
      #wrapper { 
        width:595px;
        margin:0 auto;
      }
      legend {
        margin-top: 20px;
      }
      #attribution {
        font-size:12px;
        color:#999;
        padding:20px;
        margin:20px 0;
        border-top:1px solid #ccc;
      }
      #O_o { 
        text-align: center; 
        background: #33577b;
        color: #b4c9dd;
        border-bottom: 1px solid #294663;
      }
      #O_o a:link, #O_o a:visited {
        color: #b4c9dd;
        border-bottom: #b4c9dd;
        display: block;
        padding: 8px;
        text-decoration: none;
      }
      #O_o a:hover, #O_o a:active {
        color: #fff;
        border-bottom: #fff;
        text-decoration: none;
      }
      @media only screen and (max-width: 620px), only screen and (max-device-width: 620px) {
        #wrapper {
          width: 90%;
        }
        legend {
          font-size: 24px;
          font-weight: 500;
        }
      }
      </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript">
    // if Google is down, it looks to local file...
    if (typeof jQuery == 'undefined') {
      document.write(unescape("%3Cscript src='../assets/js/jquery-1.10.2.min.js' type='text/javascript'%3E%3C/script%3E"));
    }
    </script>
    <script type="text/javascript" src="../assets/js/clone-form-td.js"></script>
    <script type="text/javascript">
      function add_row()
      {
        $rowno=$("#prestasi_table tr").length;
        $rowno=$rowno+1;
        $("#prestasi_table tr:last").
        after("<tr id='row"+$rowno+"'><td class='item_qualifikasi[]'><select name='qualifikasi[]' class='select_ttl form-control'><option value='' selected='selected' disabled='disabled'>Kualifikasi</option>  <option value='tersertifikasi'>Tersertifikasi</option><option value='non-sertifikasi'>Non-sertifikasi</option></select></td><td class='item_universitas'><select name='universitas[]' class='select_ttl form-control'><option value='' selected='selected' disabled='disabled'>Universitas</option>  <option value='dalam negeri'>Dalam Negeri</option><option value='luar negeri'>Luar Negeri</option></select></td><td class='item_prestasi'><select name='prestasi[]' class='select_ttl form-control'><option value='' selected='selected' disabled='disabled'>Prestasi</option>  <option value='dalam negeri'>Dalam Negeri</option><option value='luar negeri'>Luar Negeri</option></select></td><td class='item_lulusan'><select name='lulusan[]' class='select_ttl form-control'><option value='' selected='selected' disabled='disabled'>Lulusan</option>  <option value='S1'>S1</option><option value='S2'>S2</option><option value='S3'>S3</option></select></td><td><input type='button'class='btn btn-primary pull-right' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
      }
      function delete_row(rowno)
      {
        $('#'+rowno).remove();
      }
    </script>
    <script src="../assets/js/bootstrap.min.js"></script> <!-- only added as a smoke test for js conflicts -->
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
				<a class="navbar-brand" href="#"><span>Halaman</span>Tutor</a>
				<ul class="nav navbar-top-links navbar-right">
					</a>
						
		</div><!-- /.container-fluid -->
	</nav><div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  		<div class="profile-sidebar">
  			<div class="profile-userpic">
  			<a href="#" data-toggle="modal" data-target="#ModalFoto"><img src="../comp/foto/<?php echo $jumlah['foto'];?>" class="img-responsive" alt="Ubah Foto Profil"></a>
  			</div>
  			<div class="profile-usertitle">
  				<div class="profile-usertitle-name"><?php echo $_SESSION['username'];?></div>
  				<div class="profile-usertitle-status"><span class="indicator label-success"></span>id : <?php echo $jumlah['id_user'];?></div>
  			</div>
  			<div class="clear"></div>
  		</div>
      <ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="data.php">
						<span class="fa fa-arrow-right">&nbsp;</span> Mapel
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
          <li class="active">Pengaturan Akun</li>
        </ol>
      </div>
    <div class="panel panel-default">
      <div class="panel-heading">Pengaturan Akun</div>
      <div class="panel-body">
    
      <h2 align="center">Lengkapi Data Prestasi Anda</h2>
   <br />
   <form action="../comp/update.php" method="post">
   <div class="table-responsive">
    <table class="table table-bordered" id="prestasi_table">
     <tr id="row1">
      <th width="20%">Item Name</th>
      <th width="20%">Item Code</th>
      <th width="20%">Description</th>
      <th width="10%">Price</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td class="item_qualifikasi[]">
        <select class="select_ttl form-control" name="qualifikasi[]" id="title">
      <option value="" selected="selected" disabled="disabled">Kualifikasi</option>
      <option value="tersertifikasi">Tersertifikasi</option>
      <option value="non-sertifikasi">Non-sertifikasi</option>
      </select> <!-- end .select_ttl --></td>
      <td class="item_universitas">
        <select class="select_ttl form-control" name="universitas[]" id="title">
              <option value="" selected="selected" disabled="disabled">Universitas</option>
              <option value="luar negeri">Luar Negeri</option>
              <option value="dalam negeri">Dalam Negeri</option>
              </select> <!-- end .select_ttl -->
            </td>
      <td class="item_prestasi"><select class="select_ttl form-control" name="prestasi[]" id="title">
              <option value="" selected="selected" disabled="disabled">Prestasi</option>
              <option value="luar negeri">Luar Negeri</option>
              <option value="dalam negeri">Dalam Negeri</option>
              </select> <!-- end .select_ttl --></td>
      <td class="item_lulusan"><select class="select_ttl form-control" name="lulusan[]" id="title">
              <option value="" selected="selected" disabled="disabled">Lulusan</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
              
              </select> <!-- end .select_ttl --></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
    <input type="button" class="btn btn-primary pull-right" onclick="add_row();" value="Tambah Prestasi">
    </div>
    <div align="center">
    <button type="submit" class="btn btn-info" name="submit_row">Tambahkan</button>
    </div>
    <br/>
   </div>
    </form>
                    </div>
                  </div>
                </div>
                </div><!-- /.panel-->
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
