<thead>
  <tr align="center">
    <th width="2%">No</th>
    <th width="10%">Mapel Yang Diambil</th>
    <th width="2%">ID Mapel</th>
    <th width="18%">Aksi</th>

  </tr>
</thead>
<tbody>
  <?php
 
  $query = mysql_query ("SELECT * FROM mapel INNER JOIN ambil_mapel ON mapel.id_mapel = ambil_mapel.id_mapel where ambil_mapel.id_user='$out[id_user]' order by ambil_mapel.id_user ASC");
    if($query == false){
      die ("Terjadi Kesalahan : ". mysql_error());
    }
    $i=1;
    while ($ar = mysql_fetch_array ($query)){
      ?>
      <?php
  $sql2 = "SELECT count(id_tutor) AS jumlah FROM ambil_tutor where id_tutor='$ar[id_user]'";
  $query2 = mysql_query($sql2);
  $result = mysql_fetch_array($query2);
        ?><tr>
          <td align="center"><?php echo $i; ?></td>
          <td><?php echo $ar['mapel'];?></td>
          <td><?php echo $ar['id_mapel'];?></td>
          <?php echo"
          <td align=center>
          <a href='#' onClick='confirm_delete(\"../comp/del2.php?id=$ar[id]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>
          </td>
        </tr>";
    $i++;
  }
  ?>
</tbody>
