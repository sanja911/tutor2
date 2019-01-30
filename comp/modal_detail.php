<?php
  include "koneksi.php";
	$id=$_GET['id'];
  $sql1 = "select * from ambil_mapel where id='$id'";
	$hasil1 = mysql_query($sql1);
	$data1  = mysql_fetch_array($hasil1);
	$modal=mysql_query("SELECT * FROM ambil_mapel WHERE id='$id'");
	while($r=mysql_fetch_array($modal)){
?>
<?php
$sql = "select * from user where id_user='$data1[id_user]'";
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
                        Nama : <?php echo $data['nama_lengkap'];?></br>
                        Username : <?php echo $data['username'];?></br>
                        Email : <?php echo $data['email'];?>
                    </div>
                     </div>
                   </div>
                   <div class="form-group"><label>List User Yang Mengambil Mapel <?php echo $data1['mapel'];?></label>
                     <table id="data" class="table table-bordered table-striped table-scalable">
                     <?php
                     $query = mysql_query ("SELECT * FROM user join ambil_tutor on user.id_user=ambil_tutor.id_user where ambil_tutor.id_tutor='$data1[id_user]' order by user.id_user ASC");
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
                           <td align=center>
                           <a href='#' onClick='confirm_delete(\"../comp/del.php?id=$ar[id]\")'><button type='button' class='btn btn-sm btn-danger'>Hapus</button></a>
                           </td>
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

             <?php } ?>


            </div>


        </div>
    </div>
