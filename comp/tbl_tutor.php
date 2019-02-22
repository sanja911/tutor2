<thead>
<tr align="center">
      <th width="2%">No</th>
      <th width="10%">ID</th>
      <th width="30%">Nama Tutor</th>
      <th width="10%">Umur</th>
      <th width="20%">Jumlah Prestasi</th>
      <th width="10%">Lama Mengajar</th>
      <th width="30%">Kelas (Kuota)</th>
      <th width="40%">Aksi</th>

    </tr>
            </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM kelas join ambil_mapel on kelas.id_mapel=ambil_mapel.id_mapel JOIN kriteria ON ambil_mapel.id_user=kriteria.id_user JOIN user ON kriteria.id_user=user.id_user";
    $hasil = mysql_query($query);
       if($hasil == false){
        die ("Terjadi Kesalahan : ". mysql_error());
      }
      $i=1;
      while ($ar = mysql_fetch_array ($hasil)){

        ?>
        <?php
        $sql2 = "SELECT count(id_kelas) AS jumlah FROM ambil_tutor where id_kelas='$ar[id_kelas]'";
        $query2 = mysql_query($sql2);
        $result = mysql_fetch_array($query2);
        $sql3 = "SELECT count(prestasi) AS jumlah FROM prestasi where id_user='$ar[id_user]'";
        $query3 = mysql_query($sql3);
        $result2 = mysql_fetch_array($query3);
        ?>
          <tr>
            <td align="center"><?php echo $i; ?></td>
            <td align="center"><?php echo $ar['id_tutor'];?></td>
            <td align="center"><?php echo $ar['nama_lengkap'];?></td>
            <td align="center"><?php echo $ar['umur'];?></td>
            <td align="center"><?php echo "<a href='#' class='buka' id='$ar[id_tutor]'> $result2[jumlah]";?></td>
            <td align="center"><?php echo $ar['lama_mengajar'];?></td>
            <td align="center"><?php echo $ar['id_kelas'];?>( <?php echo $result['jumlah'];?> / <?php echo $ar['kuota'];?>)</td>
           
            <td align=center>
            <a href="ambil_tutor.php?id=<?php echo $data['id_tutor'];?>&mapel=<?php echo $data['id_mapel'];?>&kelas=<?php echo $data['id_kelas'];?>"><button type="button" class="btn btn-sm btn-info">Ambil</button></a>
            </td>
          </tr>
      <?php $i++;
      }
    ?>
  </tbody>
