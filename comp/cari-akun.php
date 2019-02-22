<?php
      if(isset($_POST['submit_row']))
        { 
          $_SESSION['session_pencarian'] = $_POST['jenis_kel'];
          $jenis_kel = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['umur_min'];
          $umur_min = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['umur_max'];
          $umur_max = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['prestasi'];
          $prestasi = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['lulusan'];
          $lulusan = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['universitas'];
          $universitas = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['qualifikasi'];
          $qualifikasi = $_SESSION['session_pencarian'];
          $_SESSION['session_pencarian'] = $_POST['mapel'];
          $mapel      = $_SESSION['session_pencarian'];
          }else {
          $keyword = ['session_pencarian'];
          $jenis_kel   = $_SESSION['session_pencarian'];
          $umur_min    = $_SESSION['session_pencarian'];
          $umur_max    = $_SESSION['session_pencarian'];
          $prestasi    = $_SESSION['session_pencarian'];
          $lulusan     = $_SESSION['session_pencarian'];
          $universitas = $_SESSION['session_pencarian'];
          $qualifikasi = $_SESSION['session_pencarian'];
          $mapel       = $_SESSION['session_pencarian'];
          }
  
      $query = mysql_query("SELECT * FROM user LEFT join kriteria on user.id_user=kriteria.id_user LEFT JOIN prestasi on kriteria.id_user=prestasi.id_user LEFT JOIN ambil_mapel on prestasi.id_user=ambil_mapel.id_user LEFT JOIN kelas on ambil_mapel.id_user=kelas.id_tutor where user.id_user like 'T%' and kriteria.jenis_kel='$jenis_kel' AND kriteria.umur between $umur_min and $umur_max AND prestasi.prestasi='$prestasi' AND prestasi.lulusan='$lulusan' AND prestasi.universitas='$universitas' AND prestasi.qualifikasi='$qualifikasi' AND ambil_mapel.mapel='$mapel'");
     
          ?>
          <table class="table table-bordered table-striped">
      <thead>
        <tr>
        <th width="2%" class="text-center">No</th>
        <th width="20%" class="text-center">Nama Lengkap</th>
        <th width="5%" class="text-center">Umur</th>
        <th width="5%" class="text-center">Email</th>
        <th width="20%" class="text-center">Prestasi</th>
        <th width="20%" class="text-center">Kelas</th>
        <th width="20%" class="text-center">Matkul</th>
        <th width="5%" class="text-center">Alamat</th>
        <th width="5%" class="text-center">Kuota</th>
        <th width="20%" class="text-center">Aksi</th>
  </tr>
    </thead>
      <tbody> 
            <?php
              if($query == false){
                die ("Terjadi Kesalahan : ".mysql_error());
              }
              $t=1;
              while ($ar = mysql_fetch_array ($query)){
                $sql2 = "SELECT count(id_tutor) AS jumlah FROM ambil_tutor where id_kelas='$ar[id_kelas]'";
                $query2 = mysql_query($sql2);
                $result = mysql_fetch_array($query2);   
                $sql2 = "SELECT count(id_user) AS jumlah FROM ambil_tutor where id_kelas='$ar[id_kelas]'";
                $query2 = mysql_query($sql2);
                $result = mysql_fetch_array($query2);   
                
                echo"
                <tr>
                    <td align=center>$t</td>
                    <td align=center><div class='profile-userpic'>
                    <img src='../comp/foto/$ar[foto]' class='img-responsive' alt=''>
                  </div>$ar[nama_lengkap] ($ar[jenis_kel]) </td>
                    <td align=center>$ar[umur]</td>
                    <td align=center>$ar[email]</td>
                    <td align=center>Prestasi tingkat $ar[prestasi] 
                    ,$ar[lulusan] di Universitas $ar[universitas] dengan Kualifikasi $ar[qualifikasi]</td>
                    <td align=center>$ar[id_kelas]</td>
                    <td align=center>$ar[mapel]</td>
                    <td align=center>$ar[alamat]</td>
                    <td align=center>$result[jumlah] / $ar[kuota]</td>
                    <td align='center'>
                    <a href='ambil_tutor.php?id=$ar[id]'><button type='button' class='btn btn-sm btn-info'>Ambil</button></a>
                  </td>
                </tr>";
                $t++;
        }
       ?>
      </tbody>