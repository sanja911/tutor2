<div class="panel panel-default">
	<div class="panel-heading">Pencarian</div>
	    <div class="panel-body">
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
               <div class="row"> 
                    <div class="col-md-3">
						<label>
						<input type="checkbox" id="jkel" name="jkel" onclick="disablejk()" value=""> Jenis Kelamin
                        </label>
                    <select id="jk" name="jenis_kel" class="form-control" disabled>
                    <option></option>
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-Laki</option> 
                    </select>
				</div>
                <div class="col-md-3">
					<label>
						<input type="checkbox" id="umr" name="umr" onclick="disableumur()" value=""> Umur
                      </label>
                    <select id="umur" name="umur_min" class="form-control" disabled>
                        <option></option>
                        <option value="20">20</option> 
                        <option value="25">25</option>
                    </select>
                    <select id="umur1" name="umur_max" class="form-control" disabled>
                        <option></option>
                        <option value="20">25 </option> 
                        <option value="25">40  </option>
                    </select>
                </div>
                
                </div>
                <div class="row">
                <div class="col-md-3">
					<label>
					<input type="checkbox" id="prest" name="prest" onclick="disablepres()" value=""> Prestasi
                    </label>
                    <select id="pr" name="prestasi" class="form-control" disabled>
                    <option></option>  
                    <option value="luar">Luar Negeri</option>
                    <option value="dalam">Dalam Negeri</option>
                    
                   </select>
                </div>
                <div class="col-md-3">
					<label>
						Lulusan
                      </label>
                      <select id="lulus" name="lulusan" class="form-control" disabled>
                      <option></option>  
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                 </select>
              </div>
              <div class="col-md-3">
				 <label>Universitas</label>
                 <select id="univ" name="universitas" class="form-control" disabled>
                 <option></option>       
                 <option value="dalam">Dalam Negeri </option>
                 <option value="luar">Luar Negeri</option>
                </select>
              </div>
              <div class="col-md-3">
                <label>Qualifikasi</label>
                 <select id="qua" name="qualifikasi" class="form-control" disabled>
                 <option></option>       
                 <option value="sertifikasi">Tersertifikasi</option>
                 <option value="nonsertifikasi">Non Sertifikasi</option>
                   
                   </select>
			</div>
            </div>
            </br>
            <button type="submit" class="btn btn-info" name="submit">Cari</button>
            </form><br></div></div>
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
                    }
            }
 
            if (isset($_POST['umr']))
            {
                $umur_min = $_POST['umur_min'];
                $umur_max = $_POST['umur_max'];

                if (empty($bagianWhere))
            {
                $bagianWhere .= "kriteria.umur between $umur_min and $umur_max";
            }
            }
 
            if (isset($_POST['prest']))
            {
                $prestasi = $_POST['prestasi'];
                $lulusan = $_POST['lulusan'];
                $universitas = $_POST['universitas'];
                $qualifikasi = $_POST['qualifikasi'];
                if (empty($bagianWhere1))
            {
                $bagianWhere1 .= "prestasi.prestasi = '$prestasi' and prestasi.lulusan='$lulusan' and prestasi.universitas='universitas' and prestasi.qualifikasi='$qualifikasi'";
            }
            
            }

            $query  = "SELECT * FROM user where username='$_SESSION[username]'";
            $hasil  = mysql_query($query);
            $out = mysql_fetch_assoc($hasil);
            $query1  = "SELECT * FROM user join kriteria where user.id_user='$out[id_user]'";
            $hasil1  = mysql_query($query1);
            $jumlah1 = mysql_fetch_assoc($hasil1);
            $query2 = "SELECT * FROM kriteria join prestasi WHERE ".$bagianWhere and.$bagianwhere1;
            $hasil2 = mysql_query($query2);
            echo "<table border='1'>";
            echo "<tr><td>NIM</td><td>Nama Mahasiswa</td><td>Alamat</td><td>Jenis Kelamin</td></tr>";
            while ($data = mysql_fetch_array($hasil2))
            {
            echo "<tr><td>".$data['id_user']."</td><td>".$data['umur']."</td><td>".$data['prestasi']."</td><td>".$data['jenis_kel']."</td></tr>";
            }
            echo "</table>";
        }
            ?>