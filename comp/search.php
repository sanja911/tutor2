<section class="container">
            <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Username</th>
            <th class="text-center">Umur</th>
            <th class="text-center">Prestasi</th>
            <th class="text-center">Lama Mengajar</th>
            <th class="text-center">Kelas</th>
	    	<th colspan="2"></th>
            </thead>
            <tbody style="height: 100vh;">
            <?php
            
            if (isset($_POST['submit']))
            {
           $bagianWhere = "";
           $bagianWhere1= "";
           if (isset($_POST['jkel']))
            {
                $jenis_kel = $_POST['jenis_kel'];
                if (empty($bagianWhere))
                    {
                        $bagianWhere .= "kriteria.jenis_kel = '$jenis_kel'";
                    }else{
                        $bagianWhere .= "AND kriteria.jenis_kel = '$jenis_kel'";
                    }
            }
            if (isset($_POST['mapel']))
            {
                $mapel = $_POST['mapel'];
                if (empty($bagianWhere))
                    {
                        $bagianWhere .= "ambil_mapel.mapel = '$mapel'";
                    }else{
                        $bagianWhere .= "AND ambil_mapel.mapel = '$mapel'";
                    }
            }
            if (isset($_POST['umr']))
            {
                $umur_min = $_POST['umur_min'];
                $umur_max = $_POST['umur_max'];

                if (empty($bagianWhere))
            {
                $bagianWhere .= "kriteria.umur between $umur_min and $umur_max";
            }else{
                $bagianWhere .= "AND kriteria.umur between $umur_min and $umur_max";
            }
            }
 
            if (isset($_POST['prest']))
            {
                $prestasi = $_POST['prestasi'];
                $lulusan = $_POST['lulusan'];
                $universitas = $_POST['universitas'];
                $qualifikasi = $_POST['qualifikasi'];
                if (empty($bagianWhere))
            {
                $bagianWhere .= "prestasi.prestasi = '$prestasi' AND prestasi.lulusan='$lulusan' and prestasi.universitas='$universitas' and prestasi.qualifikasi='$qualifikasi' limit 5";
            }else{
                $bagianWhere .= "AND prestasi.prestasi = '$prestasi' and prestasi.lulusan='$lulusan' and prestasi.universitas='$universitas' and prestasi.qualifikasi='$qualifikasi' limit 5";
            }

          }
        
            $query  = "SELECT * FROM user where username='$_SESSION[username]'";
            $hasil  = mysql_query($query);
            $out = mysql_fetch_assoc($hasil);
            $query1  = "SELECT * FROM user join kriteria where user.id_user='$out[id_user]'";
            $hasil1  = mysql_query($query1);
            $jumlah1 = mysql_fetch_assoc($hasil1);
            $query2 = "SELECT * FROM kriteria join prestasi on kriteria.id_user=prestasi.id_user join user on prestasi.id_user=user.id_user join ambil_mapel on ambil_mapel.id_user=user.id_user join kelas on ambil_mapel.id_user=kelas.id_tutor WHERE ".$bagianWhere;
            $hasil2 = mysql_query($query2);
          
            while ($data = mysql_fetch_array($hasil2))
            {
             
            ?>
            <tr>
                <td class="text-center"><?php echo $data['id_tutor'] ?></td>
                <td class="text-center"><?php echo $data['username'] ?></td>
                <td class="text-center"><?php echo $data['umur'] ?></td>
                <td class="text-center"><?php echo $data['prestasi'] ?></td>
                <td class="text-center"><?php echo $data['lama_mengajar'] ?></td>
                <td class="text-center"><?php echo $data['id_kelas'] ?></td>
                <td align="center">
                <a href="ambil_tutor.php?id=<?php echo $data['id_tutor'];?>&mapel=<?php echo $data['id_mapel'];?>&kelas=<?php echo $data['id_kelas'];?>"><button type="button" class="btn btn-sm btn-info">Ambil</button></a>
              </td>
            </tr>
    <?php }?>
    </tbody>
  <?php } ?>