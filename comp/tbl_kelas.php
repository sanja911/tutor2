  <thead>
    <tr align="center">
      <th width="2%">No</th>
      <th width="20%">Nama Kelas</th>
      <th width="30%">Nama Tutor</th>
      <th width="15%">Mapel</th>
      <th width="10%">Kuota</th>
      <th width="40%">Aksi</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $query = mysql_query ("SELECT * FROM user INNER JOIN kelas ON user.id_user = kelas.id_tutor INNER JOIN mapel ON kelas.id_mapel=mapel.id_mapel where user.id_user='$out[id_user]'  order by user.id_user ASC");
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
            <td align="center"><?php echo $ar['nama_lengkap'];?></td>
            <td align="center"><?php echo $ar['mapel'];?></td>
            <td align="center"><?php echo $result['jumlah'];?> / <?php echo $ar['kuota'];?></td>
            <?php echo"
            <td align=center>
            <a href='#' onClick='confirm_delete(\"../comp/hapus-kelas.php?id=$ar[id_kelas]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>
            <a href='#' class='open_modal' id='$ar[id_kelas]'><button type='button' class='btn btn-sm btn-info'>Detail</button></a>
            </td>
          </tr>";
      $i++;
      }
    ?>
  </tbody>
