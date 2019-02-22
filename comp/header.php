<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman User</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="../assets/css/datepicker3.css" rel="stylesheet">
	<link href="../assets/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/select2.min.css"/></head>

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="../assets/aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
  <script type="text/javascript" src="../assets/aset/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
  <script type="text/javascript" src="../assets/aset/plugins/datatables/jquery.dataTables.min.js"></script>
  <script  type="text/javascript" src="../assets/aset/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
  <script type="text/javascript" src="../assets/aset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
  <script src="../assets/aset/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
  <script src="../assets/aset/dist/js/app.min.js"></script>
	<!-- Daterange Picker -->
	<script src="../assets/aset/plugins/daterangepicker/moment.min.js"></script>
	<script src="../assets/aset/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="../assets/aset/plugins/select2/select2.full.min.js"></script>
	<script src="../assets/aset/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" >  
    
     function disablejk(){  
          if(document.getElementById("jkel").checked == true){  
              document.getElementById("jk").disabled = false;  
          }else{
            document.getElementById("jk").disabled = true;
          }  
     }  
		 function disableumur(){  
          if(document.getElementById("umr").checked == true){  
              document.getElementById("umur").disabled = false;
              document.getElementById("umur1").disabled = false;  
          }else{
            document.getElementById("umur").disabled = true;
            document.getElementById("umur1").disabled = true;
          }  
     }  
		 function disablepres(){  
          if(document.getElementById("prest").checked == true){  
               document.getElementById("pr").disabled = false;
							 document.getElementById("lulus").disabled = false;
							document.getElementById("univ").disabled = false;
							document.getElementById("qua").disabled = false;
				 }else{
            document.getElementById("pr").disabled = true;
						document.getElementById("lulus").disabled = true;
						document.getElementById("univ").disabled = true;
						document.getElementById("qua").disabled = true;
          }  
     }  
		 </script> 
</head>
