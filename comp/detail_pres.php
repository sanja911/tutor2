<?php
  include "koneksi.php";
	$id=$_GET['id'];
  $sql1 = "select * from prestasi where id_user='$id'";
	$hasil1 = mysql_query($sql1);
	$data1  = mysql_fetch_array($hasil1);
?>
<?php
$sql = "select * from user where id_user='$id'";
$hasil = mysql_query($sql);
$data  = mysql_fetch_array($hasil);
 ?>
<div class="modal-dialog">
    <div class="modal-content abt-w3l">
							<div class="modal-header">
								<button type="button" class="close clo1" data-dismiss="modal">&times;</button>
									<form>
                    <div class="row  pad-row text-center" id="3c">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                  </div>

                 <div class="col-md-4 col-sm-4 col-xs-4">

                     <img src="../comp/foto/<?php echo $data['foto'];?>" class="img-responsive img-circle pad-img" alt=""/>
                      <h4>Detail Data</h4>
                     <div class="form-group">
                     <div class="form-group">Nama : <?php echo $data['nama_lengkap'];?> (<?php echo $data['username'];?>)</div>
                     <div class="form-group">Email: <?php echo $data['email'];?></div>
                    </div>
                     </div>
                   </div>
                   <div class="form-group"><label>Prestasi <?php echo $data['nama_lengkap'];?></label>
                     <table id="data" class="table table-bordered table-striped table-scalable">
                     <?php
                     $query = mysql_query ("SELECT * FROM user join prestasi on user.id_user=prestasi.id_user where prestasi.id_user='$id' order by user.id_user ASC");
                       if($query == false){
                         die ("Terjadi Kesalahan : ". mysql_error());
                       }
                      $i=1;
                      while ($ar = mysql_fetch_array ($query)){

                       echo "
                       <tbody>
                         <tr>
                           <td align=center>$i</td>
                           <td>$ar[nama_lengkap]</td>
                           <td>Prestasi $ar[prestasi]</td>
                           <td>Lulusan $ar[lulusan]</td>
                           <td>Universitas $ar[universitas]</td>
                           <td>Kualifikasi $ar[qualifikasi]</td>
                           </td>
                         </tr>";
                     $i++;
                   }
                   ?>
                 </tbody>
               </table>
     							</div>
					</form>

			</div>
						</div>
					</div>


            </div>


        </div>
    </div>
