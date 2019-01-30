<thead>
  <tr align="center">
    <th width="2%">No</th>
    <th width="10%">Mapel Yang Diambil</th>
    <th width="10%">Jumlah Siswa</th>
    <th width="18%">Aksi</th>

  </tr>
</thead>
<tbody>
  <?php
  $sql = "SELECT count(id_user) AS jumlah FROM ambil_tutor where id_tutor='$out[id_user]'";
  $query = mysql_query($sql);
  $result = mysql_fetch_array($query);
  $query = mysql_query ("SELECT * FROM user INNER JOIN ambil_mapel ON user.id_user = ambil_mapel.id_user where user.id_user='$out[id_user]' order by user.id_user ASC");
    if($query == false){
      die ("Terjadi Kesalahan : ". mysql_error());
    }
    $i=1;
    while ($ar = mysql_fetch_array ($query)){

      ?>
        <tr>
          <td align="center"><?php echo $i; ?></td>
          <td><?php echo $ar[mapel];?></td>
          <td><?php echo $result['jumlah'];?></td>
          <?php echo"
          <td align=center>
          <a href='#' onClick='confirm_delete(\"../comp/hapus.php?id=$ar[id]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>
          <a href='#' class='open_modal' id='$ar[id]'><button type='button' class='btn btn-sm btn-info'>Detail</button></a>
          </td>
        </tr>";
    $i++;
    }
  ?>
</tbody>
