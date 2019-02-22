<?php
  include "koneksi.php";
	$id=$_GET['id'];
  
?>
<?php
$sql = "select * from user where id_user='$r[id_user]'";
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

                    
                     </div>
                   </div>
                   <div class="form-group"><label>List User Yang Mengambil Mapel <?php echo $id?></label>
                     <table id="data" class="table table-bordered table-striped table-scalable">
                     
                    <div class="form-group"><label>Data Siswa <?php echo $id;?></label>
                     <table id="data" class="table table-bordered table-striped table-scalable">
                     <?php
                     $query = mysql_query ("SELECT * FROM ambil_tutor join user on ambil_tutor.id_user=user.id_user where ambil_tutor.id_kelas='$id' order by user.id_user ASC");
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
                           </td>
                           </td>
                         </tr>";
                     $i++;
                   }
                   ?>
                 </tbody>
               </table>
                  </form>

			</div>
						</div>
					</div>
          </div>


        </div>
    </div>
