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
    <!-- End Navbar -->
    <div class="panel panel-default">
      <div class="panel-heading">Ambil Mapel </div>
      <div class="panel-body">
        <div class="col-md-6">


      <form class="form-horizontal" role="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div class="col-md-4">
          <div class="form-group">
              <select class="form-control" name="umur_min">
          <option selected disabled class="bmd-label-floating">Umur Minimal</option>
          <?php
            $sql = mysql_query("SELECT * FROM kriteria ORDER BY umur ASC");
            if(mysql_num_rows($sql) != 0){
              while($data = mysql_fetch_assoc($sql)){
          echo '<option>'.$data['umur'].'</option>';
          }
          }
          ?>
          </select>
        </div>
       </div>
       <div class="col-md-4">
         <div class="form-group">
             <select class="form-control" name="umur_max">
         <option selected disabled class="bmd-label-floating">Umur Maksimal</option>
         <?php
           $sql = mysql_query("SELECT * FROM kriteria ORDER BY umur DESC");
           if(mysql_num_rows($sql) != 0){
             while($data = mysql_fetch_assoc($sql)){
         echo '<option>'.$data['umur'].'</option>';
         }
         }
         ?>
         </select>
       </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
            <select class="form-control" name="prestasi_max">
        <option selected disabled class="bmd-label-floating">Jumlah Prestasi</option>
        <?php
          $sql = mysql_query("SELECT * FROM kriteria ORDER BY prestasi ASC");
          if(mysql_num_rows($sql) != 0){
            while($data = mysql_fetch_assoc($sql)){
        echo '<option>'.$data['prestasi'].'</option>';
        }
        }
        ?>
        </select>
      </div>
     </div>
     <div class="col-md-4">
       <div class="form-group">
           <select class="form-control" name="lama_min">
       <option selected disabled class="bmd-label-floating">Minimal Mengajar</option>
       <?php
         $sql = mysql_query("SELECT * FROM kriteria ORDER BY lama_mengajar ASC");
         if(mysql_num_rows($sql) != 0){
           while($data = mysql_fetch_assoc($sql)){
       echo '<option>'.$data['lama_mengajar'].'</option>';
       }
       }
       ?>
       </select>
     </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
          <select class="form-control" name="lama_max">
      <option selected disabled class="bmd-label-floating">Maksimal Mengajar</option>
      <?php
        $sql = mysql_query("SELECT * FROM kriteria ORDER BY lama_mengajar DESC");
        if(mysql_num_rows($sql) != 0){
          while($data = mysql_fetch_assoc($sql)){
      echo '<option>'.$data['lama_mengajar'].'</option>';
      }
      }
      ?>
      </select>
    </div>
   </div>

          <div class="col-md-4">
                      <div class="form-group">
                        <select class="form-control" name="jenis_kel">
            <option selected disabled class="bmd-label-floating">Jenis Kelamin</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
           </select>
                      </div>
         </div>

        </div>

      <div class="col-md-4">
      <button class="btn btn-default" type="submit" name="submit_cari">Cari Akun</button>
      </div>
        </form>
      </div>
  </div>
      <?php
      if(isset($_GET['cari-akun'])) {
      include "../comp/cari-akun.php";
      }
      ?>

              </div>
              <?php

                  if(isset($_POST['submit_cari'])) {
                      $_SESSION['session_pencarian'] = $_POST['umur_min'];
                      $umur_min = $_SESSION['session_pencarian'];
              		$_SESSION['session_pencarian'] = $_POST['umur_max'];
                      $umur_max = $_SESSION['session_pencarian'];
              		$_SESSION['session_pencarian'] = $_POST['prestasi_max'];
                      $prestasi_max = $_SESSION['session_pencarian'];
              		$_SESSION['session_pencarian'] = $_POST['lama_min'];
                      $lama_min = $_SESSION['session_pencarian'];
              		$_SESSION['session_pencarian'] = $_POST['lama_max'];
                      $lama_max = $_SESSION['session_pencarian'];
              		$_SESSION['session_pencarian'] = $_POST['jenis_kel'];
                      $jenis_kel = $_SESSION['session_pencarian'];
              	 }else {
                      $keyword = ['session_pencarian'];
              		$umur_min = $_SESSION['session_pencarian'];
              		$umur_max = $_SESSION['session_pencarian'];
              		$prestasi_max = $_SESSION['session_pencarian'];
              		$lama_min = $_SESSION['session_pencarian'];
              	    $lama_max = $_SESSION['session_pencarian'];
              	    $jenis_kel = $_SESSION['session_pencarian'];
              	}

                  $query = mysql_query("SELECT user.id_user,user.username,kriteria.id_user,kriteria.umur,kriteria.prestasi,kriteria.prestasi,kriteria.jenis_kel,kriteria.lama_mengajar FROM user LEFT join kriteria on user.id_user=kriteria.id_user where user.id_user like 'T%' AND kriteria.umur between $umur_min and $umur_max AND kriteria.prestasi between 0 and $prestasi_max AND kriteria.lama_mengajar between $lama_min and $lama_max and kriteria.jenis_kel='$jenis_kel'");

              ?>
                  <tbody>
                      <?php while($row = mysql_fetch_array($query)) {
                        echo"
                          <tr>
                              <td>$row[id_user]</td>
                              <td>$row[username]</td>
                              <td>$row[umur]</td>
                              <td>$row[prestasi]</td>
                              <td>$row[lama_mengajar]</td>
                              <td align='center'>
                              <a href='ambil_tutor.php?id=$row[id_user]'><button type='button' class='btn btn-sm btn-info'>Ambil</button></a>
                            </td>
                          </tr>";
                  } ?>
                  </tbody>
              </table>
