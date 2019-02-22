  <thead>
    <tr align="center">
      <th width="2%">No</th>
      <th width="30%">Materi</th>
      <th width="30%">File</th>
      <th widht= "30">Kuota Kelas </th>
      <th width="20%">Aksi</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysql_query ("SELECT * FROM materi INNER JOIN kelas ON materi.id_tutor = kelas.id_tutor INNER JOIN mapel ON kelas.id_mapel=mapel.id_mapel where materi.id_kelas='$id' and materi.id_tutor='$out2[id_tutor]' order by materi.id_tutor ASC");
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
            <td align="center"><?php echo $ar['judul'];?></td>
            <td align="center"><a href="../comp/dok/<?php echo $ar['file'];?>"><?php echo $ar['file'];?></a></td>
            <?php echo "<td align=center><a href='#' class='buka' id='$ar[id_kelas]'>$result[jumlah]</a> / $ar[kuota]</td>";?>
            <?php echo"
            <td align=center>
            <a href='#' class='open_modal2' id='$ar[id_materi]'><button type='button' class='btn btn-sm btn-info'>Detail</button></a>
            </td>
          </tr>";
      $i++;
      }
    ?>
  </tbody>
