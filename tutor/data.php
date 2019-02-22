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
	
<link rel="stylesheet" href="../assets/css/select2.min.css"/>
<script type="text/javascript" src="../assets/aset/plugins/datatables/jquery.dataTables.min.js"></script>
<script  type="text/javascript" src="../assets/aset/plugins/datatables/dataTables.bootstrap.min.js"></script>

</head>
<body>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pilih Mapel</h4>
            </div>
            <div class="modal-body">
              <form action="../comp/ambil_mapel.php" method="post">
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                     <select id="mapel" name="mapel[]" class="form-control" multiple="multiple">
                  <?php
                        $sql = mysql_query("SELECT * FROM mapel ORDER BY id_mapel ASC");
                        if(mysql_num_rows($sql) != 0){
                          while($data = mysql_fetch_assoc($sql)){
                      echo '<option>'.$data['mapel'].'</option>';
                      }
                      }
                      ?>
                   </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="submit_row">Tambahkan</button>
            </div>
          </form>
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
	</nav><?php
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
					<li><a class="active" href="data.php">
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
  <div id="edit" class="modal fade" tabindex="-1" role="dialog"></div>
  <!-- end-->
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
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
              Data Mapel
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
    <a href="#"><button class="btn btn-success" type="button" data-target="#myModal" data-toggle="modal"><i class="fa fa-plus"></i>Tambah Mapel</button></a>
        <br></br>
    <table id="data" class="table table-bordered table-striped table-scalable">
            <?php
              include "../comp/tbl_mapel.php";
            ?>
                  </table>
    <br></br>
  </div>
</div>
</div>
</div>
<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="https://www.sanja.com">sanja</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
  <script src="../assets/js/jquery-2.1.4.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery-1.11.2.min.js"></script>
  <script src="../assets/js/select2.min.js"></script>
  <script>
    $(document).ready(function () {
    $("#mapel").select2({
    placeholder: "Please Select"
      });
      });
  </script>
  <script type="text/javascript">
		$(document).ready(function () {

		// Dosen
		$(".open_modal").click(function(e) {
			var m = $(this).attr("id");
				$.ajax({
					url: "../comp/modal_detail.php",
					type: "GET",
					data : {id: m,},
					success: function (ajaxData){
					$("#edit").html(ajaxData);
					$("#edit").modal('show',{backdrop: 'true'});
					}
				});
			});
		});
	</script>
	<!-- Javascript Delete -->
	<script>
		function confirm_delete(delete_url){
			$("#hapus").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}
	</script>
  <script>
    function confirm_delete(delete_url){
      $("#hapus").modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script>
    $(function () {
    // Data Table
      $("#data").dataTable({
    scrollX: true
  });
    });
  </script>
  <script type="text/javascript" src="../assets/aset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script  type="text/javascript" src="../assets/aset/plugins/datatables/dataTables.bootstrap.min.js"></script>

  <?php
  /*      $sql = "select * from user where username='$_SESSION[username]'";
        $hasil = mysql_query($sql);
        $data  = mysql_fetch_array($hasil);
        $sql1 = mysql_query("select * from ambil_mapel where id_user='$data[id_user]'");
        if (mysql_num_rows($sql1) == 0) {*/
        ?>
  <script>
    $('#myModal').modal('show');
  </script>
  <?php
//  }
   ?>

</body>

</html>
