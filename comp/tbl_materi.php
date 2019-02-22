  <thead>
    <tr align="center">
      <th width="2%">No</th>
      <th width="20%">Nama Kelas</th>
      <th width="20%">Mapel</th>
      <th width="15%">Materi</th>
      <th width="15%">File</th>
      <th width="40%">Aksi</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysql_query ("SELECT * FROM user INNER JOIN materi on user.id_user=materi.id_tutor INNER JOIN kelas ON materi.id_tutor = kelas.id_tutor INNER JOIN mapel ON kelas.id_mapel=mapel.id_mapel where user.id_user='$out[id_user]'  order by user.id_user ASC");
      if($query == false){
        die ("Terjadi Kesalahan : ". mysql_error());
      }
      $i=1;
      while ($ar = mysql_fetch_array ($query)){

        ?>
        <?php
        $sql2 = "SELECT count(id_tutor) AS jumlah FROM ambil_tutor where id_kelas='$ar[id_kelas]'";
        $query2 = mysql_query($sql2);
        $result = mysql_fetch_array($query2);
        ?>
          <tr>
            <td align="center"><?php echo $i; ?></td>
            <td align="center"><?php echo $ar['id_kelas'];?></td>
            <td align="center"><?php echo $ar['mapel'];?></td>
            <td align="center"><?php echo $ar['judul'];?></td>
            <td align="center"><a href="../comp/dok/<?php echo $ar['file'];?>"><?php echo $ar['file'];?></a></td>
            <?php echo"
            <td align=center>
            <a href='#' onClick='confirm_delete(\"../comp/hapus.php?id=$ar[id_kelas]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>
            <a href='#' class='open_modal2' id='$ar[id_materi]'><button type='button' class='btn btn-sm btn-info'>Detail</button></a>
            </td>
          </tr>";
      $i++;
      }
    ?>
  </tbody>
